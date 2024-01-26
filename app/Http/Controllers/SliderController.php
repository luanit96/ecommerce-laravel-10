<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Traits\StorageImageTrait;

class SliderController extends Controller
{   
    use StorageImageTrait;
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

    public function store(Request $request) {
        $dataCreateSlider = [
            'name' => $request->name,
            'link' => $request->link,
            'description' => $request->description
        ];
        
        $dataUploadSliderImage = $this->storageTraitUpload($request, 'image_path', 'slider');
        $dataCreateSlider['image_path'] = $dataUploadSliderImage['file_path'];
        $dataCreateSlider['image_name'] = $dataUploadSliderImage['file_name'];

        //create data to table slider
        $this->slider->create($dataCreateSlider);

        return redirect()->route('list-sliders');

    }

    public function edit($id) {
        $slider = $this->slider->find($id);
        return view('admin.sliders.edit', compact('slider'));
    }

    public function update(Request $request, $id) {
        $dataUpdateSlider = [
            'name' => $request->name,
            'link' => $request->link,
            'description' => $request->description
        ];
        $dataUploadSliderImage = $this->storageTraitUpload($request, 'image_path', 'slider');
        $dataUpdateSlider['image_path'] = $dataUploadSliderImage['file_path'];
        $dataUpdateSlider['image_name'] = $dataUploadSliderImage['file_name'];
        //update data to table slider
        $this->slider->find($id)->update($dataUpdateSlider); 
        return redirect()->route('list-sliders');
    }

    public function delete($id) {
        try {
            $slider = $this->slider->find($id)->delete();
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
