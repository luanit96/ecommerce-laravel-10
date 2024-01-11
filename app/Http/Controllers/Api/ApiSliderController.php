<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\ApiSliderRequest;

class ApiSliderController extends Controller
{

    public function index() {
        $sliders = Slider::all();
        return response()->json($sliders);
    }

    public function store(ApiSliderRequest $request) {
        $slider = new Slider;
        $slider->fill($request->all());
        $slider->created_at = Carbon::now('Asia/Ho_Chi_Minh');
        $slider->save();
        return response()->json($slider);
    }

    public function show($id) {
        $slider = Slider::find($id);
        if(!$slider) return response()->json('Slider not found');
        return response()->json($slider);
    }

    public function edit($id) {
        $slider = Slider::find($id);
        if(!$slider) return response()->json('Slider not found');
        return response()->json($slider);
    }

    public function update(ApiSliderRequest $request, $id) {
        $slider = Slider::find($id);
        $slider->name = $request->name;
        $slider->images = $request->images;
        $slider->link = $request->link;
        $slider->description = $request->description;
        $slider->updated_at = Carbon::now('Asia/Ho_Chi_Minh');
        $slider->save();
        return response()->json($slider);
    }

    public function delete($id) {
        $slider = Slider::find($id);
        if($slider) {
            $slider->delete();
            return response()->json('Slider deleted');
        } else return response()->json('Slider not found');
    }
}
