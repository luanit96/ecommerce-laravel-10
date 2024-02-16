<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Core\CategoryRecusive;
use App\Traits\DeleteModelTrait;
use App\Traits\StorageImageTrait;
use App\Http\Requests\AddCategoryRequest;
use App\Http\Requests\EditCategoryRequest;

class CategoryController extends Controller
{
    use StorageImageTrait, DeleteModelTrait;
    private $category;

    public function __construct(Category $category) {
        $this->category = $category;
    }

    public function index() {
        $categories = $this->category->all();
        return view('admin.categories.index', compact('categories'));
    }

    public function create() {
        $htmlOptions = $this->getCategory($parentId = '');
        return view('admin.categories.create', compact('htmlOptions'));
    }

    public function store(AddCategoryRequest $request) {
        $dataCategoryCreate = [
            'parent_id' => $request->parent_id,
            'name' => $request->name
        ];
        $dataUploadImage = $this->storageTraitUpload($request, 'image_path', 'category');
        if(!empty($dataUploadImage)) {
            $dataCategoryCreate['image_path'] = $dataUploadImage['file_path'];
            $dataCategoryCreate['image_name'] = $dataUploadImage['file_name'];
        }
        $category = $this->category->create($dataCategoryCreate);

        return redirect()->route('list-categories');
    }

    public function getCategory($parentId) {
        $recusive = new CategoryRecusive();
        $htmlOptions = $recusive->getCategoryRecusive($parentId);
        return $htmlOptions;
    }

    public function edit($id) {
        $category = $this->category->find($id);
        $htmlOptions = $this->getCategory($category->parent_id);
        return view('admin.categories.edit', compact('category', 'htmlOptions'));
    }

    public function update($id, EditCategoryRequest $request) {
        $dataCategoryUpdate = [
            'parent_id' => $request->parent_id,
            'name' => $request->name
        ];
        
        $dataUploadImage = $this->storageTraitUpload($request, 'image_path', 'category');
        if(!empty($dataUploadImage)) {
            $dataCategoryUpdate['image_path'] = $dataUploadImage['file_path'];
            $dataCategoryUpdate['image_name'] = $dataUploadImage['file_name'];
        }
        
        $category = $this->category->find($id)->update($dataCategoryUpdate);
        return redirect()->route('list-categories');
    }

    public function delete($id) {
        $deleteTrait = $this->deleteModelTrait($this->category, $id);
        return response()->json([
            'code' => $deleteTrait['code'],
            'message' => $deleteTrait['message']
        ], $deleteTrait['status']);
    }
}
