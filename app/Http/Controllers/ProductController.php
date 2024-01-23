<?php

namespace App\Http\Controllers;

use DB;
use Log;
use App\Models\Tag;
use App\Models\Product;
use App\Models\ProductTag;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Core\CategoryRecusive;
use App\Traits\StorageImageTrait;

class ProductController extends Controller
{

    use StorageImageTrait;
    private $product, $productImage, $tag, $productTag;

    public function __construct(Product $product, 
        ProductImage $productImage, Tag $tag, ProductTag $productTag) {
        $this->product = $product;
        $this->productImage = $productImage;
        $this->tag = $tag;
        $this->productTag = $productTag;
    }

    public function index() {
        $products = $this->product->all();
        return view('admin.products.index', compact('products'));
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
        try {
            DB::beginTransaction();
            //insert data to table products
            $dataProductCreate = [
                'category_id' => $request->category_id,
                'user_id' => auth()->id(),
                'name' => $request->name,
                'price' => $request->price,
                'discount' => $request->discount,
                'content' => $request->contents
            ];
            $dataUploadFeatureImage = $this->storageTraitUpload($request, 'feature_image_path', 'product');
            if(!empty($dataUploadFeatureImage)) {
                $dataProductCreate['feature_image_path'] = $dataUploadFeatureImage['file_path'];
                $dataProductCreate['feature_image_name'] = $dataUploadFeatureImage['file_name'];
            }
            
            $product = $this->product->create($dataProductCreate);

            //insert data to table product_images
            if($request->hasFile('image_path')) {
                foreach($request->image_path as $fileItem) {
                    $dataUploadProductImage = $this->storageTraitUploadMutible($fileItem, 'product');
                    $product->images()->create([
                        'image_path' => $dataUploadProductImage['file_path'],
                        'image_name' => $dataUploadProductImage['file_name']
                    ]);
                }
            }

            //insert tags for table product
            if(!empty($request->tags)) {
                foreach($request->tags as $tagItem) {
                    $tagInstance = $this->tag->firstOrCreate(['name' => $tagItem]);
                    $tagIds[] = $tagInstance->id;
                }
                $product->tags()->attach($tagIds);
            }
            DB::commit();
            return redirect()->route('list-products');

        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message:' . $exception->getMessage() . '--Line:' . $exception->getLine());
        }
    }

    public function edit() {

    }

    public function update() {

    }

    public function delete() {

    }
}