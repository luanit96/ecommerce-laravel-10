<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Traits\DeleteModelTrait;
use App\Http\Requests\TagRequest;
use App\Http\Requests\EditTagRequest;

class TagController extends Controller
{
    use DeleteModelTrait;
    private $tag;

    public function __construct(Tag $tag) {
        $this->tag = $tag;
    }

    public function index() {
        $tags = $this->tag->all();
        return view('admin.tags.index', compact('tags'));
    }

    public function create() {
        return view('admin.tags.create');
    }

    public function store(TagRequest $request) {
        $tag = $this->tag->create([
            'name' => $request->name
        ]);
        return redirect()->route('list-tags');
    }

    public function edit($id) {
        $tag = $this->tag->find($id);
        return view('admin.tags.edit', compact('tag'));
    }

    public function update(EditTagRequest $request, $id) {
        $this->tag->find($id)->update([
            'name' => $request->name
        ]);
        return redirect()->route('list-tags');
    }

    public function delete($id) {
        $deleteTrait = $this->deleteModelTrait($this->tag, $id);
        return response()->json([
            'code' => $deleteTrait['code'],
            'message' => $deleteTrait['message']
        ], $deleteTrait['status']);
    }
}
