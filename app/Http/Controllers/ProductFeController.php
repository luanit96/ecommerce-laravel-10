<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Sample;
use App\Models\Product;
use App\Core\MenuRecusive;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Core\CategoryRecusive;

class ProductFeController extends Controller
{
    public function getProductDetail($productSlug) {
        $menus = $this->getMenus();
        $listCategory = $this->getCategories();
        $productDetail = Product::where('slug', $productSlug)->first();
        if($productDetail == null) abort(404);
        //Update views by product detail
        $views = $productDetail->views;
        Product::where('slug', $productSlug)->update([ 'views' => $views += 1 ]);
        $relateProduct = Product::where('category_id', $productDetail->category_id)->where('id', '!=', $productDetail->id)->limit(8)->get();
        $productImageByProduct = ProductImage::select('image_path')->where('product_id', $productDetail->id)->limit(9)->get();
        return view('home.product.product-detail', compact('menus', 'listCategory', 'productDetail', 'relateProduct', 'productImageByProduct'));
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
