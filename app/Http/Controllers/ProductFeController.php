<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Core\MenuRecusive;
use Illuminate\Http\Request;
use App\Core\CategoryRecusive;

class ProductFeController extends Controller
{
    public function getProductDetail($productId) {
        $menus = $this->getMenus();
        $listCategory = $this->getCategories();
        $productDetail = Product::find($productId);
        $relateProduct = Product::where('category_id', $productDetail->category_id)->where('id', '!=', $productId)->limit(8)->get();
        return view('home.product.product-detail', compact('menus', 'listCategory', 'productDetail', 'relateProduct'));
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
}
