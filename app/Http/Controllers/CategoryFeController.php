<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Core\MenuRecusive;
use Illuminate\Http\Request;
use App\Core\CategoryRecusive;

class CategoryFeController extends Controller
{
    public function getProductByCategory($slug, $categoryId) {
        $menus = $this->getMenus();
        $listCategory = $this->getCategories();
        $category = Category::find($categoryId);
        $productByCategory = Product::where('category_id', $categoryId)->paginate(15); 
        return view('home.product.category.list', compact('menus', 'listCategory', 'category', 'productByCategory'));
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
