<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Traits\DeleteModelTrait;
use App\Traits\StorageImageTrait;
use App\Http\Requests\SliderRequest;

class SliderController extends Controller
{   
    use StorageImageTrait, DeleteModelTrait;
    private $slider;

    public function __construct(Slider $slider) {
        $this->slider = $slider;
    }

    public function index() {
        $sliders = $this->slider->all();
        return view('admin.sliders.index', compact('sliders'));
    }

    public function create() {
        return view('admin.sliders.create');
    }

    public function store(SliderRequest $request) {
        $dataCreateSlider = [
            'name' => $request->name,
            'link' => $request->link,
            'description' => $request->description
        ];
        
        $dataUploadSliderImage = $this->storageTraitUpload($request, 'image_path', 'slider');
        if(!empty($dataUploadSliderImage)) {
            $dataCreateSlider['image_path'] = $dataUploadSliderImage['file_path'];
            $dataCreateSlider['image_name'] = $dataUploadSliderImage['file_name'];
        }

        //create data to table slider
        $this->slider->create($dataCreateSlider);
        return redirect()->route('list-sliders');

    }

    public function edit($id) {
        $slider = $this->slider->find($id);
        return view('admin.sliders.edit', compact('slider'));
    }

    public function update(SliderRequest $request, $id) {
        $dataUpdateSlider = [
            'name' => $request->name,
            'link' => $request->link,
            'description' => $request->description
        ];
        $dataUploadSliderImage = $this->storageTraitUpload($request, 'image_path', 'slider');
        if(!empty($dataUploadSliderImage)) {
            $dataUpdateSlider['image_path'] = $dataUploadSliderImage['file_path'];
            $dataUpdateSlider['image_name'] = $dataUploadSliderImage['file_name'];
        }
        
        //update data to table slider
        $this->slider->find($id)->update($dataUpdateSlider); 
        return redirect()->route('list-sliders');
    }

    public function delete($id) {
        $deleteTrait = $this->deleteModelTrait($this->slider, $id);
        return response()->json([
            'code' => $deleteTrait['code'],
            'message' => $deleteTrait['message']
        ], $deleteTrait['status']);
    }
}
