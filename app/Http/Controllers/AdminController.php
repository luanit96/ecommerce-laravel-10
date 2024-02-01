<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        $countCategory = Category::all()->count();
        $countProduct = Product::all()->count();
        $countMenu = Menu::all()->count();
        $countUser = User::all()->count();
        return view('admin.dashboard', compact('countCategory', 'countProduct', 'countMenu', 'countUser'));
    }
}
