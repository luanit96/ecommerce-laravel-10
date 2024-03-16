<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;
use App\Traits\DeleteModelTrait;
use App\Traits\StorageImageTrait;
use App\Http\Requests\ColorRequest;
use App\Http\Requests\EditColorRequest;

class ColorController extends Controller
{
    use StorageImageTrait, DeleteModelTrait;
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
        $dataColorCreate = [
            'name' => $request->name,
            'quantity' => $request->quantity 
        ];
        $dataUploadImage = $this->storageTraitUpload($request, 'image_path', 'color');
        if(!empty($dataUploadImage)) {
            $dataColorCreate['image_path'] = $dataUploadImage['file_path'];
            $dataColorCreate['image_name'] = $dataUploadImage['file_name'];
        }
        $this->color->create($dataColorCreate);
        return redirect()->route('list-colors');
    }

    public function edit($id) {
        $color = $this->color->find($id);
        return view('admin.colors.edit', compact('color'));
    }

    public function update(EditColorRequest $request, $id) {
        $dataColorUpdate = [
            'name' => $request->name,
            'quantity' => $request->quantity
        ];
        $dataUploadImage = $this->storageTraitUpload($request, 'image_path', 'color');
        if(!empty($dataUploadImage)) {
            $dataColorUpdate['image_path'] = $dataUploadImage['file_path'];
            $dataColorUpdate['image_name'] = $dataUploadImage['file_name'];
        }
        $this->color->find($id)->update($dataColorUpdate);
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
