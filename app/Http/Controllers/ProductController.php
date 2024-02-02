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
use App\Traits\DeleteModelTrait;
use App\Traits\StorageImageTrait;
use App\Http\Requests\AddProductRequest;
use App\Http\Requests\EditProductRequest;

class ProductController extends Controller
{

    use StorageImageTrait, DeleteModelTrait;
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

    public function store(AddProductRequest $request) {
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
                    $dataUploadProductImage = $this->storageTraitUploadMultiple($fileItem, 'product');
                    $product->images()->create([
                        'image_path' => $dataUploadProductImage['file_path'],
                        'image_name' => $dataUploadProductImage['file_name']
                    ]);
                }
            }

            //insert tags to table product
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

    public function edit($id) {
        $product = $this->product->find($id);
        $htmlOptions = $this->getCategory($product->category_id);
        return view('admin.products.edit', compact('product', 'htmlOptions'));
    }

    public function update(EditProductRequest $request, $id) {
        try {
            DB::beginTransaction();
            //update data to table products
            $dataProductUpdate = [
                'category_id' => $request->category_id,
                'user_id' => auth()->id(),
                'name' => $request->name,
                'price' => $request->price,
                'discount' => $request->discount,
                'content' => $request->contents
            ];
            $dataUploadFeatureImage = $this->storageTraitUpload($request, 'feature_image_path', 'product');
            if(!empty($dataUploadFeatureImage)) {
                $dataProductUpdate['feature_image_path'] = $dataUploadFeatureImage['file_path'];
                $dataProductUpdate['feature_image_name'] = $dataUploadFeatureImage['file_name'];
            }
            
            $this->product->find($id)->update($dataProductUpdate);
            $product = $this->product->find($id);

            if($request->hasFile('image_path')) {
                //delete product_images where table product_images.product_id == table products.id
                $this->productImage->where('product_id', $id)->delete();
                foreach($request->image_path as $fileItem) {
                    $dataUploadProductImage = $this->storageTraitUploadMultiple($fileItem, 'product');
                    //insert data to table product_images
                    $product->images()->create([
                        'image_path' => $dataUploadProductImage['file_path'],
                        'image_name' => $dataUploadProductImage['file_name']
                    ]);
                }
            }

            //update tags to table product
            if(!empty($request->tags)) {
                foreach($request->tags as $tagItem) {
                    $tagInstance = $this->tag->firstOrCreate(['name' => $tagItem]);
                    $tagIds[] = $tagInstance->id;
                }
                $product->tags()->sync($tagIds);
            }
            DB::commit();
            return redirect()->route('list-products');

        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message:' . $exception->getMessage() . '--Line:' . $exception->getLine());
        }
    }

    public function delete($id) {
        $deleteTrait = $this->deleteModelTrait($this->product, $id);
        return response()->json([
            'code' => $deleteTrait['code'],
            'message' => $deleteTrait['message']
        ], $deleteTrait['status']);
    }
}