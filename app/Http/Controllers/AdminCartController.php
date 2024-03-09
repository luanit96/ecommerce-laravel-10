<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Color;
use App\Models\Size;
use App\Models\Sample;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Traits\DeleteModelTrait;

class AdminCartController extends Controller
{
    use DeleteModelTrait;

    private $cart;

    public function __construct(Cart $cart) {
        $this->cart = $cart;
    }

    public function index() {
        $orders = $this->cart->all();
        return view('admin.orders.index', compact('orders'));
    }

    public function show($id) {
        $order = $this->cart->find($id);
        return view('admin.orders.show', compact('order'));
    }

    public function update(Request $request, $id) {
        $cart = $this->cart->find($id);
        
        //update quantity table products
        $this->updateQtyProduct($request, $cart);

        //update status table carts
        $cart->find($id)->update([
            'status' => $request->status
        ]);
        return redirect()->route('list-orders');
    }

    public function updateQtyProduct($request, $cart) {
        if($request->status === 'success') {
            foreach($cart->cartdetails as $cartDetailItem) {
                $product = Product::find($cartDetailItem->product_id);
                $productQty = $product->quantity - $cartDetailItem->quantity;
                $product->update([
                    'quantity' => $productQty
                ]);
                //update quantity color product to table colors
                $cartQty = $cartDetailItem->quantity;
                $cartColorName = $cartDetailItem->color;
                foreach($product->colors as $productColorItem) {
                    $productColorName = $productColorItem->name;
                    $productColorItem->quantity -= $cartQty;
                    if($cartColorName === $productColorName) {
                        Color::find($productColorItem->id)->update([
                            'quantity' => $productColorItem->quantity
                        ]);
                    }
                }
                //update quantity size product to table sizes
                $cartSizeName = $cartDetailItem->size;
                foreach($product->sizes as $productSizeItem) {
                    $productSizeName = $productSizeItem->name;
                    $productSizeItem->quantity -= $cartQty;
                    if($cartSizeName === $productSizeName) {
                        Size::find($productSizeItem->id)->update([
                            'quantity' => $productSizeItem->quantity
                        ]);
                    }
                }
                //update quantity sample product to table samples
                $cartSampleName = $cartDetailItem->sample;
                foreach($product->samples as $productSampleItem) {
                    $productSampleName = $productSampleItem->name;
                    $productSampleItem->quantity -= $cartQty;
                    if($cartSampleName === $productSampleName) {
                        Sample::find($productSampleItem->id)->update([
                            'quantity' => $productSampleItem->quantity
                        ]);
                    }
                }
            }   
        }
    }

    public function delete($id) {
        $deleteTrait = $this->deleteModelTrait($this->cart, $id);
        return response()->json([
            'code' => $deleteTrait['code'],
            'message' => $deleteTrait['message']
        ], $deleteTrait['status']);
    }
}
