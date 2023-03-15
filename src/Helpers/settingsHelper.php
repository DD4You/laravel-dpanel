<?php

if (!function_exists('settings')) {
    function settings($key = null, $default = null, $fetch = false)
    {
        return 'setting helper';
        $settings = app()->make('\DD4You\Dpanel\Models\Setting');

        if (empty($key)) {
            return $settings;
        }

        return $settings->get($key, $default, $fetch);
    }
}
