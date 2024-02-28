<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use App\Core\MenuRecusive;
use Illuminate\Http\Request;
use App\Core\CategoryRecusive;
use App\Http\Requests\CartRequest;
use App\Http\Services\CartService;
use App\Http\Requests\CustommerRequest;
use App\Http\Requests\UpdateCartRequest;

class CartController extends Controller
{
    protected $cartService;

    public function __construct(CartService $cartService) {
        $this->cartService = $cartService;
    }

    public function index(CartRequest $request) {
        if(!Auth::user()) return redirect()->route('login');
        $result = $this->cartService->create($request);
        if(!$result) return redirect()->back();

        return redirect()->route('carts');
    }

    public function show() {
        $menus = $this->getMenus();
        $listCategory = $this->getCategories();
        $products = $this->cartService->getProduct();
        $carts = Session::get('carts');
        return view('home.carts.list', compact('menus', 'listCategory', 'products', 'carts'));
    }

    public function getMenus() {
        $recusive = new MenuRecusive();
        $html = $recusive->renderMenu();
        return $html;
    }

    public function getCategories() {
        $recusive = new CategoryRecusive();
        $html = $recusive->renderCategory();
        return $html;
    }

    public function update(UpdateCartRequest $request) {
        $this->cartService->update($request);
        return redirect()->route('carts');
    }

    public function delete($id) {
        $this->cartService->delete($id);
        return redirect()->route('carts');
    }

    public function checkout() {
        $menus = $this->getMenus();
        $listCategory = $this->getCategories();
        $products = $this->cartService->getProduct();
        $carts = Session::get('carts');
        return view('home.checkout', compact('menus', 'listCategory', 'products', 'carts'));
    }

    public function orders(CustommerRequest $request) {
        $this->cartService->orders($request);

        return redirect()->back();
    }

}
