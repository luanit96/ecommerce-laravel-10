<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Core\CategoryRecusive;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
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

    public function store(Request $request) {
        $category = $this->category->create([
            'parent_id' => $request->parent_id,
            'name' => $request->name
        ]);

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

    public function update($id, Request $request) {
       $category = $this->category->find($id)->update([
            'parent_id' => $request->parent_id,
            'name' => $request->name
        ]);
        return redirect()->route('list-categories');
    }

    public function delete($id) {
        $category = $this->category->find($id)->delete();
        return redirect()->route('list-categories');
    }
}
