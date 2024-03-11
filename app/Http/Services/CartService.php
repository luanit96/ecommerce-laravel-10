<?php

namespace App\Http\Services;

use Log;
use Session;
use App\Models\Cart;
use App\Models\CartDetail;
use App\Models\Size;
use App\Models\Color;
use App\Models\Sample;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class CartService 
{
    public function create($request) {
        $size = (int) $request->size;
        $color = (int) $request->color;
        $sample = (int) $request->sample;
        $qty = (int) $request->input('num_product');
        $product_id = (int) $request->input('product_id');

        $size = $size <= 0 ? null : Size::find($size)->name;
        $color = $color <= 0 ? null : Color::find($color)->name;
        $sample = $sample <= 0 ? null : Sample::find($sample)->name;

        if ($qty <= 0 || $product_id <= 0) {
            Session::flash('error', 'Số lượng hoặc Sản phẩm không chính xác');
            return false;
        }

        $productQty = Product::where('id', $product_id)->first()->quantity;

        if($qty > $productQty) {
            Session::flash('error', 'Số lượng không đủ, vui lòng thử lại');
            return false;
        }

        // Session::flush();

        $carts = Session::get('carts');

        if (is_null($carts) || empty($carts)) {
            Session::put('carts', [
                $product_id => [
                    'quantity' => $qty,
                    'size' => $size,
                    'color' => $color,
                    'sample' => $sample
                ]
            ]);

            return true;
        }

        // dd($carts);

        $exists = Arr::exists($carts, $product_id);

        if($exists) {
            if($carts[$product_id]['size'] === $size && $carts[$product_id]['color'] === $color &&
                $carts[$product_id]['sample'] === $sample) {
                $this->putCartdoubleQuantity($carts, $product_id, $qty, $size, $color, $sample);
                return true;
            } else if($carts[$product_id]['size'] === $size && $carts[$product_id]['color'] === $color &&
                is_null($carts[$product_id]['sample'])){
                $this->putCartdoubleQuantity($carts, $product_id, $qty, $size, $color, $sample);
                return true;
            } else if($carts[$product_id]['size'] === $size && is_null($carts[$product_id]['color']) &&
                is_null($carts[$product_id]['sample'])){
                $this->putCartdoubleQuantity($carts, $product_id, $qty, $size, $color, $sample); 
                return true;
            } else if(is_null($carts[$product_id]['size']) && $carts[$product_id]['color'] === $color &&
                $carts[$product_id]['sample'] === $sample) {
                $this->putCartdoubleQuantity($carts, $product_id, $qty, $size, $color, $sample);
                return true;
            } else if($carts[$product_id]['size'] === $size && is_null($carts[$product_id]['color']) &&
                is_null($carts[$product_id]['sample'])) {
                $this->putCartdoubleQuantity($carts, $product_id, $qty, $size, $color, $sample);
                return true;
            } else if(is_null($carts[$product_id]['size']) && $carts[$product_id]['color'] === $color &&
                is_null($carts[$product_id]['sample'])) {
                $this->putCartdoubleQuantity($carts, $product_id, $qty, $size, $color, $sample);
                return true;
            } else if(is_null($carts[$product_id]['size']) && is_null($carts[$product_id]['color']) &&
                $carts[$product_id]['sample'] === $sample) {
                $this->putCartdoubleQuantity($carts, $product_id, $qty, $size, $color, $sample);
                return true;
            } else {
                $this->putCart($carts, $product_id, $qty, $size, $color, $sample);
                return true;
            }
        } 

        $this->putCart($carts, $product_id, $qty, $size, $color, $sample);
        return true;
    }

    public function putCart($carts, $product_id, $qty, $size, $color, $sample) {
        $carts[$product_id]['quantity'] = $qty;
        $carts[$product_id]['size'] = $size;
        $carts[$product_id]['color'] = $color;
        $carts[$product_id]['sample'] = $sample;
        Session::put('carts', $carts);
    }

    public function putCartdoubleQuantity($carts, $product_id, $qty, $size, $color, $sample) {
        $carts[$product_id]['quantity'] += $qty;
        $carts[$product_id]['size'] = $size;
        $carts[$product_id]['color'] = $color;
        $carts[$product_id]['sample'] = $sample;
        Session::put('carts', $carts);
    }

    public function getProduct() {
        $carts = Session::get('carts');

        if(is_null($carts)) return [];

        $productId = array_keys($carts);

        return Product::select('id', 'name', 'price', 'discount', 'feature_image_path')->whereIn('id', $productId)->get();
    }

    public function update($request) {
        $carts = Session::get('carts');
        $numProducts = $request->input('num_product');
        foreach($numProducts as $productId => $numProduct) {
            //check quantity product to quantity order
            $checkQtyProduct = $this->checkQtyProductOrder($productId, $numProduct);
            if(!$checkQtyProduct) return redirect()->back();
            $carts[$productId]['quantity'] = $numProduct;
        }
        Session::put('carts', $carts);
        Session::flash('success', 'Cập nhật giỏ hàng thành công');
        return true;
    }

    public function checkQtyProductOrder($productId, $numProduct) {
        $productQty = Product::where('id', $productId)->first()->quantity;
        if($numProduct > $productQty) {
            Session::flash('error', 'Số lượng không đủ, vui lòng thử lại');
            return false;
        }
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

            //insert data to table customers
            $customer = Customer::create([
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'address' => $request->address . ' , ' 
                . $request->ward_vn . ' , ' 
                . $request->distrist_vn . ' , ' 
                . $request->province_vn,
                'note' => $request->note
            ]);

            //get product cart info
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
        $dataCartDetail = [];
        $total = 0;

        $productId = array_keys($carts);

        $products = Product::select('id', 'name', 'price', 'discount', 'feature_image_path')->whereIn('id', $productId)->get();

        foreach($products as $product) {
            $price = $product->discount != 0 ? $product->discount : $product->price;
            $total += ($price * $carts[$product->id]['quantity']);
        }

        //insert data to table carts
        $cart = Cart::create([
            'customer_id' => $customer_id,
            'total' => $total
        ]);

        foreach($products as $product) {
            $price = $product->discount != 0 ? $product->discount : $product->price;
            $dataCartDetail[] = [
                'cart_id' => $cart->id,
                'product_id' => $product->id,
                'size' => $carts[$product->id]['size'],
                'color' => $carts[$product->id]['color'],
                'sample' => $carts[$product->id]['sample'],
                'quantity' => $carts[$product->id]['quantity'],
                'price' => $price,
                'totalPrice' => $price * $carts[$product->id]['quantity']
            ];
        }
        //insert data to table cart_details
        return CartDetail::insert($dataCartDetail);
    }
}
