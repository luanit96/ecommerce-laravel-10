<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Core\MenuRecusive;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    private $menu;

    public function __construct(Menu $menu) {
        $this->menu = $menu;
    }

    public function getMenu($parentId) {
        $recusive = new MenuRecusive();
        $htmlOptions = $recusive->getMenuRecusive($parentId);
        return $htmlOptions;
    }

    public function index() {
        $menus = $this->menu->all();
        return view('admin.menus.index', compact('menus'));
    }

    public function create() {
        $htmlOptions = $this->getMenu($parentId = '');
        return view('admin.menus.create', compact('htmlOptions'));
    }

    public function store(Request $request) {
        $menu = $this->menu->create([
            'parent_id' => $request->parent_id,
            'name' => $request->name
        ]);

        return redirect()->route('list-menus');
    }

    public function edit($id) {
        $menu = $this->menu->find($id);
        $htmlOptions = $this->getMenu($menu->parent_id);
        return view('admin.menus.edit', compact('menu', 'htmlOptions'));
    }

    public function update($id, Request $request) {
        $menu = $this->menu->find($id)->update([
            'parent_id' => $request->parent_id,
            'name' => $request->name
        ]);
        return redirect()->route('list-menus');
    }

    public function delete($id) {
        try {
            $menu = $this->menu->find($id)->delete();
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
