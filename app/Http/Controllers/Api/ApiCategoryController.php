<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ApiCategoryRequest;

class ApiCategoryController extends Controller
{
    public function index() {
        $categories = Category::all();
        return response()->json($categories);
    }

    public function store(ApiCategoryRequest $request) {
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
}
