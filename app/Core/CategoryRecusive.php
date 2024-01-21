<?php 

namespace App\Core;
use App\Models\Category;

class CategoryRecusive {

    private $htmlSelected;

    public function __constructor() {
        $this->htmlSelected = '';
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
}
