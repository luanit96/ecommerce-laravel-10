<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use App\Models\Product;
use App\Models\Category;
use App\Core\MenuRecusive;
use App\Core\CategoryRecusive;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $menus = $this->getMenus();
        $listCategory = $this->getCategories();
        $sliders = Slider::orderByDesc('created_at')->limit(3)->get();
        $categories = Category::limit(6)->get();
        $newProducts = Product::orderByDesc('created_at')->limit(8)->get();
        $favouriteProducts = Product::orderByDesc('views')->limit(12)->get();
        return view('home.index', compact('sliders', 'categories', 'newProducts', 'favouriteProducts', 'menus', 'listCategory'));
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

    public function getAboutUs() {
        return view('home.about-us');
    }

    public function getContactUs() {
        return view('home.contact-us');
    }
}
