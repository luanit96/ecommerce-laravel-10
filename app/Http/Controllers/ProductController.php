<?php

namespace App\Http\Controllers;

use DB;
use Log;
use Str;
use App\Models\Tag;
use App\Models\Size;
use App\Models\Color;
use App\Models\Sample;
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
    private $product, $productImage, $tag, $productTag, $color, $size, $sample;

    public function __construct(Product $product, 
        ProductImage $productImage, Tag $tag, ProductTag $productTag, 
        Color $color, Size $size, Sample $sample) {
        $this->product = $product;
        $this->productImage = $productImage;
        $this->tag = $tag;
        $this->productTag = $productTag;
        $this->color = $color;
        $this->size = $size;
        $this->sample = $sample;
    }

    public function index() {
        $products = $this->product->all();
        return view('admin.products.index', compact('products'));
    }

    public function create() {
        $htmlOptions = $this->getCategory($parentId = '');
        $colors = $this->color->all();
        $sizes = $this->size->all();
        $samples = $this->sample->all();
        return view('admin.products.create', compact('htmlOptions', 'colors', 'sizes', 'samples'));
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
                'content' => $request->contents,
                'slug' => Str::slug($request->name),
                'quantity' => $request->quantity
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

            //insert data to table tags
            if(!empty($request->tags)) {
                foreach($request->tags as $tagItem) {
                    $tagInstance = $this->tag->firstOrCreate(['name' => $tagItem]);
                    $tagIds[] = $tagInstance->id;
                }
                $product->tags()->attach($tagIds);
            }

            //insert data to table product_colors
            if(!empty($request->colors)) {
                $product->colors()->attach($request->colors);
            }

            //insert data to table product_sizes
            if(!empty($request->sizes)) {
                $product->sizes()->attach($request->sizes);
            }
            
            //insert data to table product_samples
            if(!empty($request->samples)) {
                $product->samples()->attach($request->samples);
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
        $colors = $this->color->all();
        $sizes = $this->size->all();
        $samples = $this->sample->all();
        return view('admin.products.edit', compact('product', 'htmlOptions', 'colors', 'sizes', 'samples'));
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
                'content' => $request->contents,
                'slug' => Str::slug($request->name),
                'quantity' => $request->quantity
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
            $tagIds = [];

            if(!empty($request->tags)) {
                foreach($request->tags as $tagItem) {
                    $tagInstance = $this->tag->firstOrCreate(['name' => $tagItem]);
                    $tagIds[] = $tagInstance->id;
                }
            }
            $product->tags()->sync($tagIds);

            //update data to table product_colors
            $colorIds = [];
            if(!empty($request->colors)) {
                $colorIds = $request->colors;
            }
            $product->colors()->sync($colorIds);

            //update data to table product_sizes
            $sizeIds = [];
            if(!empty($request->sizes)) {
                $sizeIds = $request->sizes;
            }
            $product->sizes()->sync($sizeIds);

            //update data to table product_samples
            $sampleIds = [];
            if(!empty($request->samples)) {
                $sampleIds = $request->samples;
            }
            $product->samples()->sync($sampleIds);

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