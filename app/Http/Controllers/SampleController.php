<?php

namespace App\Http\Controllers;

use App\Models\Sample;
use Illuminate\Http\Request;
use App\Traits\DeleteModelTrait;
use App\Traits\StorageImageTrait;
use App\Http\Requests\SampleRequest;
use App\Http\Requests\EditSampleRequest;

class SampleController extends Controller
{
    use StorageImageTrait, DeleteModelTrait;
    private $sample;

    public function __construct(Sample $sample) {
        $this->sample = $sample;
    }

    public function index() {
        $samples = $this->sample->all();
        return view('admin.samples.index', compact('samples'));
    }

    public function create() {
        return view('admin.samples.create');
    }

    public function store(SampleRequest $request) {
        $dataSampleCreate = [
            'name' => $request->name,
            'quantity' => $request->quantity 
        ];
        $dataUploadImage = $this->storageTraitUpload($request, 'image_path', 'sample');
        if(!empty($dataUploadImage)) {
            $dataSampleCreate['image_path'] = $dataUploadImage['file_path'];
            $dataSampleCreate['image_name'] = $dataUploadImage['file_name'];
        }
        $this->sample->create($dataSampleCreate);
        return redirect()->route('list-samples');
    }

    public function edit($id) {
        $sample = $this->sample->find($id);
        return view('admin.samples.edit', compact('sample'));
    }

    public function update(EditSampleRequest $request, $id) {
        $dataSampleUpdate = [
            'name' => $request->name,
            'quantity' => $request->quantity 
        ];
        $dataUploadImage = $this->storageTraitUpload($request, 'image_path', 'sample');
        if(!empty($dataUploadImage)) {
            $dataSampleUpdate['image_path'] = $dataUploadImage['file_path'];
            $dataSampleUpdate['image_name'] = $dataUploadImage['file_name'];
        }
        $this->sample->find($id)->update($dataSampleUpdate);
        return redirect()->route('list-samples');
    }

    public function delete($id) {
        $deleteTrait = $this->deleteModelTrait($this->sample, $id);
        return response()->json([
            'code' => $deleteTrait['code'],
            'message' => $deleteTrait['message']
        ], $deleteTrait['status']);
    }
}
