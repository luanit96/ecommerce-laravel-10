<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Core\MenuRecusive;
use Illuminate\Http\Request;
use App\Core\CategoryRecusive;

class CategoryFeController extends Controller
{
    public function getProductByCategory($slug) {
        $menus = $this->getMenus();
        $listCategory = $this->getCategories();
        $category = Category::select('id', 'name', 'slug')->where('slug', $slug)->first();
        if($category == null) abort(404);
        $productByCategory = Product::where('category_id', $category->id)->paginate(16);
        $newProducts = Product::orderByDesc('created_at')->limit(8)->get(); 
        return view('home.product.category.list', compact('menus', 'listCategory', 'category', 'productByCategory', 'newProducts'));
    }

    public function getProductByCategoryOrderBy($slug, $name) {
        if($name == 'asc' || $name == 'desc') {
            $menus = $this->getMenus();
            $listCategory = $this->getCategories();
            $category = Category::select('id', 'name', 'slug')->where('slug', $slug)->first();
            if($category == null) abort(404);
            $productByCategory = Product::orderBy('name', $name)->where('category_id', $category->id)->paginate(15);
            $newProducts = Product::orderByDesc('created_at')->limit(8)->get(); 
            return view('home.product.category.list', compact('menus', 'listCategory', 'category', 'productByCategory', 'newProducts'));
        }
        abort(404);
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
