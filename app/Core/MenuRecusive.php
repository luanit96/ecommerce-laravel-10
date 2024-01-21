<?php 

namespace App\Core;
use App\Models\Menu;

class MenuRecusive {

    private $htmlSelected;

    public function __constructor() {
        $this->htmlSelected = '';
    }

    public function getMenuRecusive($parentId, $id = 0, $txt = '') {
        $menus = Menu::all();
        foreach($menus as $menu) {
            if($menu['parent_id'] == $id) {
                if(!empty($parentId) && $parentId == $menu['id']) {
                    $this->htmlSelected .= "<option selected value=" . $menu['id'] . ">" . $txt . $menu['name'] ."</option>";
                } else {
                    $this->htmlSelected .= "<option value=" . $menu['id'] . ">" . $txt . $menu['name'] ."</option>";
                }
                $this->getMenuRecusive($parentId, $menu['id'], $txt.'--');
            }
        }
        return $this->htmlSelected;
    }
}
