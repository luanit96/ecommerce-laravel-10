<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Core\CategoryRecusive;
use App\Traits\StorageImageTrait;

class ProductController extends Controller
{

    use StorageImageTrait;
    private $product;

    public function __construct(Product $product) {
        $this->product = $product;
    }

    public function index() {
        return view('admin.products.index');
    }

    public function create() {
        $htmlOptions = $this->getCategory($parentId = '');
        return view('admin.products.create', compact('htmlOptions'));
    }

    public function getCategory($parentId) {
        $recusive = new CategoryRecusive();
        $htmlOptions = $recusive->getCategoryRecusive($parentId);
        return $htmlOptions;
    }

    public function store(Request $request) {
        $data = $this->storageTraitUpload($request, 'feature_image_path', 'product');
        dd($data);
    }

    public function edit() {

    }

    public function update() {

    }

    public function delete() {

    }
}