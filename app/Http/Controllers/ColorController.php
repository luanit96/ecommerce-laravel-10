<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;
use App\Traits\DeleteModelTrait;
use App\Http\Requests\ColorRequest;

class ColorController extends Controller
{
    use DeleteModelTrait;
    private $color;

    public function __construct(Color $color) {
        $this->color = $color;
    }

    public function index() {
        $colors = $this->color->all();
        return view('admin.colors.index', compact('colors'));
    }

    public function create() {
        return view('admin.colors.create');
    }

    public function store(ColorRequest $request) {
        $this->color->create([
            'name' => $request->name,
            'quantity' => $request->quantity
        ]);
        return redirect()->route('list-colors');
    }

    public function edit($id) {
        $color = $this->color->find($id);
        return view('admin.colors.edit', compact('color'));
    }

    public function update(ColorRequest $request, $id) {
        $this->color->find($id)->update([
            'name' => $request->name,
            'quantity' => $request->quantity
        ]);
        return redirect()->route('list-colors');
    }

    public function delete($id) {
        $deleteTrait = $this->deleteModelTrait($this->color, $id);
        return response()->json([
            'code' => $deleteTrait['code'],
            'message' => $deleteTrait['message']
        ], $deleteTrait['status']);
    }
}
