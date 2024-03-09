<?php

namespace App\Http\Controllers;

use App\Models\Size;
use Illuminate\Http\Request;
use App\Traits\DeleteModelTrait;
use App\Http\Requests\SizeRequest;

class SizeController extends Controller
{
    use DeleteModelTrait;
    private $size;

    public function __construct(Size $size) {
        $this->size = $size;
    }

    public function index() {
        $sizes = $this->size->all();
        return view('admin.sizes.index', compact('sizes'));
    }

    public function create() {
        return view('admin.sizes.create');
    }

    public function store(SizeRequest $request) {
        $this->size->create([
            'name' => $request->name,
            'quantity' => $request->quantity
        ]);
        return redirect()->route('list-sizes');
    }

    public function edit($id) {
        $size = $this->size->find($id);
        return view('admin.sizes.edit', compact('size'));
    }

    public function update(SizeRequest $request, $id) {
        $this->size->find($id)->update([
            'name' => $request->name,
            'quantity' => $request->quantity
        ]);
        return redirect()->route('list-sizes');
    }

    public function delete($id) {
        $deleteTrait = $this->deleteModelTrait($this->size, $id);
        return response()->json([
            'code' => $deleteTrait['code'],
            'message' => $deleteTrait['message']
        ], $deleteTrait['status']);
    }
}
