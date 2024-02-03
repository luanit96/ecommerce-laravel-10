<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Traits\DeleteModelTrait;
use App\Http\Requests\SettingRequest;

class SettingController extends Controller
{
    use DeleteModelTrait;
    private $setting;

    public function __construct(Setting $setting) {
        $this->setting = $setting;
    }

    public function index() {
        $settings = $this->setting->all();
        return view('admin.settings.index', compact('settings'));
    }

    public function create() {
        return view('admin.settings.create');
    }

    public function store(SettingRequest $request) {
        $setting = $this->setting->create([
            'key' => $request->key,
            'value' => $request->value,
            'type' => $request->type
        ]);
        return redirect()->route('list-settings');
    }

    public function edit($id) {
        $setting = $this->setting->find($id);
        return view('admin.settings.edit', compact('setting'));
    }

    public function update(SettingRequest $request, $id) {
        $setting = $this->setting->find($id)->update([
            'key' => $request->key,
            'value' => $request->value,
            'type' => $request->type
        ]);
        return redirect()->route('list-settings');
    }

    public function delete($id) {
        $deleteTrait = $this->deleteModelTrait($this->setting, $id);
        return response()->json([
            'code' => $deleteTrait['code'],
            'message' => $deleteTrait['message']
        ], $deleteTrait['status']);
    }
}
