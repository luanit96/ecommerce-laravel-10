<?php

namespace App\Http\Controllers;

use App\Models\Sample;
use Illuminate\Http\Request;
use App\Traits\DeleteModelTrait;
use App\Http\Requests\SampleRequest;

class SampleController extends Controller
{
    use DeleteModelTrait;
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
        $this->sample->create([
            'name' => $request->name,
            'quantity' => $request->quantity
        ]);
        return redirect()->route('list-samples');
    }

    public function edit($id) {
        $sample = $this->sample->find($id);
        return view('admin.samples.edit', compact('sample'));
    }

    public function update(SampleRequest $request, $id) {
        $this->sample->find($id)->update([
            'name' => $request->name,
            'quantity' => $request->quantity
        ]);
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
