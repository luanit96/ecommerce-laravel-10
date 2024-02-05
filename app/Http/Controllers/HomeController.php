<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $products = Product::orderByDesc('created_at')->limit(8)->get();
        $categories = Category::orderByDesc('created_at')->limit(6)->get();
        $sliders = Slider::orderByDesc('created_at')->limit(3)->get();
        return view('home.index', compact('sliders', 'categories', 'products'));
    }

    public function getAboutUs() {
        return view('home.about-us');
    }

    public function getContactUs() {
        return view('home.contact-us');
    }
}
