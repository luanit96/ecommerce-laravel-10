<?php 

namespace App\Core;
use App\Models\Category;

class Recusive {

    private $htmlSelected;

    public function __constructor() {
        $this->htmlSelected = '';
    }

    public function categoryRecusive($parentId, $id = 0, $text = '') {
        $categories = Category::all();
        foreach($categories as $value) {
            if($value['parent_id'] == $id) {
                if(!empty($parentId) && $parentId == $value['id']) {
                    $this->htmlSelected .= "<option selected value=" . $value['id'] . ">" . $text . $value['name'] ."</option>";
                } else {
                    $this->htmlSelected .= "<option value=" . $value['id'] . ">" . $text . $value['name'] ."</option>";
                }
                $this->categoryRecusive($parentId, $value['id'], $text.'--');
            }
        }
        return $this->htmlSelected;
    }
}
