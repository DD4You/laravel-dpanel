<?php

if (!function_exists('settings')) {
    function settings($key = null, $fetch = false)
    {
        $settings = app()->make('\DD4You\Dpanel\Models\Setting');

        if (empty($key)) {
            return $settings;
        }

        return $settings->get($key, $fetch);
    }
}
