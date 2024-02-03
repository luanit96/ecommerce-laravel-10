<?php

namespace App\Http\Controllers;

use App\Models\ProductTag;
use Illuminate\Http\Request;

class ProductTagController extends Controller
{
    public function index() {
        $productTags = ProductTag::all();
        return view('admin.product-tag.index', compact('productTags'));
    }
}
