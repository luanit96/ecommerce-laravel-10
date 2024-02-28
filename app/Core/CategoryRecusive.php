<?php 

namespace App\Core;
use App\Models\Category;

class CategoryRecusive {

    private $htmlSelected, $html;

    public function __constructor() {
        $this->htmlSelected = '';
        $this->html = '';
    }

    public function getCategoryRecusive($parentId, $id = 0, $text = '') {
        $categories = Category::all();
        foreach($categories as $value) {
            if($value['parent_id'] == $id) {
                if(!empty($parentId) && $parentId == $value['id']) {
                    $this->htmlSelected .= "<option selected value=" . $value['id'] . ">" . $text . $value['name'] ."</option>";
                } else {
                    $this->htmlSelected .= "<option value=" . $value['id'] . ">" . $text . $value['name'] ."</option>";
                }
                $this->getCategoryRecusive($parentId, $value['id'], $text.'--');
            }
        }
        return $this->htmlSelected;
    }

    public function renderCategory($parentId = 0, $level = 0) {
        $categories = Category::all();
        if($level == 0) $this->html = '<div class="navbar-nav w-100 overflow-hidden" style="height:400px">';
        foreach($categories as $category) {
            if($category['parent_id'] == $parentId) {
                if($this->hasChild($categories, $category['id'])) {
                    $this->html .= '<div class="nav-item dropdown">
                        <a href="'. route('category-product', ['slug' => $category['slug']]) .'" class="nav-link" data-toggle="dropdown">'. $category['name'] .
                        '<i class="fa fa-angle-down float-right mt-1"></i></a>
                        <div class="dropdown-menu position-absolute bg-secondary border-0 rounded-0 w-100 m-0">';
                    foreach($categories as $categoryItem) {
                        if($categoryItem['parent_id'] == $category['id']) $this->html .= '<a href="'. route('category-product', ['slug' => $categoryItem['slug']]) .'" class="dropdown-item">'. $categoryItem['name'] .'</a>';
                    }
                    $this->html .= '</div></div>';
                } else $this->html .= '<a href="'. route('category-product', ['slug' => $category['slug']]) .'" class="nav-item nav-link">'. $category['name'] .'</a>';
            }
        }

        $this->html .= '</div>';
        return $this->html;
    }

    public function hasChild($categories, $id) {
        foreach ($categories as $category) {
            if($category['parent_id'] == $id) return true;
        }
        return false;
    }
}
