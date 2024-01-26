<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
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

    public function store(Request $request) {
        $tag = $this->tag->create([
            'name' => $request->name
        ]);
        return redirect()->route('list-tags');
    }

    public function edit($id) {
        $tag = $this->tag->find($id);
        return view('admin.tags.edit', compact('tag'));
    }

    public function update(Request $request, $id) {
        $this->tag->find($id)->update([
            'name' => $request->name
        ]);
        return redirect()->route('list-tags');
    }

    public function delete($id) {
        try {
            $product = $this->tag->find($id)->delete();
            return response()->json([
                'code' => 200,
                'message' => 'success'
            ], 200);
        } catch (\Exception $exception) {
            Log::error('Message:' . $exception->getMessage() . '--Line:' . $exception->getLine());
            return response()->json([
                'code' => 500,
                'message' => 'fail'
            ], 500);
        }
    }
}
