<?php

namespace App\Http\Controllers;

use App\Models\ProductImage;
use Illuminate\Http\Request;

class ProductImageController extends Controller
{
    public function index() {
        $productImages = ProductImage::all();
        return view('admin.product-image.index', compact('productImages'));
    }
}
