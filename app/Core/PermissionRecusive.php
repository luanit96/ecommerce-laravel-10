<?php 

namespace App\Core;
use App\Models\Permission;

class PermissionRecusive {

    private $htmlSelected;

    public function __constructor() {
        $this->htmlSelected = '';
    }

    public function getPermissionRecusive($parentId, $id = 0, $txt = '') {
        $permissions = Permission::all();
        foreach($permissions as $permission) {
            if($permission['parent_id'] == $id) {
                if(!empty($parentId) && $parentId == $permission['id']) {
                    $this->htmlSelected .= "<option selected value=" . $permission['id'] . ">" . $txt . $permission['name'] ."</option>";
                } else {
                    $this->htmlSelected .= "<option value=" . $permission['id'] . ">" . $txt . $permission['name'] ."</option>";
                }
                $this->getPermissionRecusive($parentId, $permission['id'], $txt.'--');
            }
        }
        return $this->htmlSelected;
    }
}
