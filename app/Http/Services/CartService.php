<?php

namespace App\Http\Services;

use Log;
use Session;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class CartService 
{
    public function create($request) {
        $qty = (int) $request->input('num_product');
        $product_id = (int) $request->input('product_id');

        if ($qty <= 0 || $product_id <= 0) {
            Session::flash('error', 'Số lượng hoặc Sản phẩm không chính xác');
            return false;
        }

        // Session::forget('carts');

        $carts = Session::get('carts');

        if (is_null($carts)) {
            Session::put('carts', [
                $product_id => $qty
            ]);
            return true;
        }

        $exists = Arr::exists($carts, $product_id);

        if($exists) {
            $carts[$product_id] = $carts[$product_id] + $qty;
            Session::put('carts', $carts);
            return true;
        }

        $carts[$product_id] = $qty;
        Session::put('carts', $carts);

        return true;
    }

    public function getProduct() {
        $carts = Session::get('carts');

        if(is_null($carts)) return [];

        $productId = array_keys($carts);

        return Product::select('id', 'name', 'price', 'discount', 'feature_image_path')->whereIn('id', $productId)->get();
    }

    public function update($request) {
        $numProduct = $request->input('num_product');
        Session::put('carts', $numProduct);
        return true;
    }

    public function delete($id) {
        $carts = Session::get('carts');
        //delete cart product by id
        unset($carts[$id]);
        Session::put('carts', $carts);
        return true;
    }

    public function orders($request) {
       try {

            DB::beginTransaction();
        
            $carts = Session::get('carts');

            if(is_null($carts)) return false;

            $customer = Customer::create([
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'address' => $request->address,
                'note' => $request->note
            ]);

            $this->infoProductCart($carts, $customer->id);

            DB::commit();

            Session::flash('success', 'Đặt hàng thành công');

            Session::forget('carts');

       } catch (\Exception $exception) {
            DB::rollback();
            Session::flash('error', 'Đặt hàng thất bại, vui lòng thử lại');
            Log::error('Message:' . $exception->getMessage() . '--Line:' . $exception->getLine());
            return false;
       }

       return true;
    }

    protected function infoProductCart($carts, $customer_id) {
        $productId = array_keys($carts);

        $products = Product::select('id', 'name', 'price', 'discount', 'feature_image_path')->whereIn('id', $productId)->get();

        $data = [];

        foreach($products as $product) {
            $data[] = [
                'customer_id' => $customer_id,
                'product_id' => $product->id,
                'quantity' => $carts[$product->id],
                'price' => $product->discount != 0 ? $product->discount : $product->price
            ];
        }

        return Cart::insert($data);
    }
}