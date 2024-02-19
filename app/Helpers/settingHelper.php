<?php

use App\Models\Setting;

function getConfigValueSettingTable($settingKey) {
    $settings = Setting::where('key', $settingKey)->first();
    if(!empty($settings)) {
        return $settings->value;
    }   
    return null;
}