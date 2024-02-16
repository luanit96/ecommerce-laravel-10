<?php 

namespace App\Core;
use App\Models\Menu;

class MenuRecusive {

    private $htmlSelected, $html;

    public function __constructor() {
        $this->htmlSelected = '';
        $this->html = '';
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

    public function renderMenu($parentId = 0, $level = 0) {
        $menus = Menu::all();
        if($level == 0) $this->html = '<div class="navbar-nav mr-auto py-0">';
        foreach($menus as $menu) {
            if($menu['parent_id'] == $parentId) {
                if($this->hasChild($menus, $menu['id'])) {
                    $this->html .= '<div class="nav-item dropdown">
                            <a href="" class="nav-link dropdown-toggle" data-toggle="dropdown">'. 
                            $menu['name'] .'</a><div class="dropdown-menu rounded-0 m-0">';
                    foreach($menus as $menuItem) {
                        if($menuItem['parent_id'] == $menu['id']) $this->html .= '<a href="" class="dropdown-item">'. $menuItem['name'] .'</a>';
                    }
                    $this->html .= '</div></div>';
                } else $this->html .= '<a href="" class="nav-item nav-link">' . $menu['name'] . '</a>';
            }
        }

        $this->html .= '</div>';
        return $this->html;
    }

    public function hasChild($menus, $id) {
        foreach ($menus as $menu) {
            if($menu['parent_id'] == $id) return true;
        }
        return false;
    }
}
