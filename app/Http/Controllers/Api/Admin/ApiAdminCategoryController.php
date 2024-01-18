<?php

namespace App\Http\Controllers\Api\Admin;

use Carbon\Carbon;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ApiCategoryRequest;
use App\Services\AdminCategoryService;

class ApiAdminCategoryController extends Controller
{
    private $arrCategories;

    public function __construct() {
        $this->arrCategories = [];
    }

    public function index() {
        $categories = Category::all();
        return response()->json($categories);
    }

    public function create() {
        $categoriesRecusive = $this->categoryRecusive(0);
        return response()->json($categoriesRecusive);
    }

    public function add(ApiCategoryRequest $request) {
        $category = new Category;
        $category->fill($request->all());
        $category->created_at = Carbon::now('Asia/Ho_Chi_Minh');
        $category->save();
        return response()->json($category);
    }

    public function show($id) {
        $category = Category::find($id);
        if(!$category) return response()->json('Category not found');
        return response()->json($category);
    }

    public function edit($id) {
        $category = Category::find($id);
        if(!$category) return response()->json('Category not found');
        return response()->json($category);
    }

    public function update(ApiCategoryRequest $request, $id) {
        $category = Category::find($id);
        $category->name = $request->name;
        $category->parent_id = $request->parent_id;
        $category->updated_at = Carbon::now('Asia/Ho_Chi_Minh');
        $category->save();
        return response()->json($category);
    }

    public function delete($id) {
        $category = Category::find($id);
        if($category) {
            $category->delete();
            return response()->json('Category deleted');
        } else return response()->json('Category not found');
    }

    public function categoryRecusive($id) {
        $categories = Category::all();
        foreach($categories as $category) {
            if($category['parent_id'] == $id) {
                $this->arrCategories[] = [
                    'id' => $category['id'],
                    'name' => $category['name'],
                    'parent_id' => $category['parent_id']
                ];
                $this->categoryRecusive($category['id']);
            }
        }
        return $this->arrCategories;
    }
}
