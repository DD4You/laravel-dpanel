<?php

namespace DD4You\Dpanel\Facades;

use Illuminate\Support\Facades\Facade;

class GlobalSetting extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'g_settings';
    }
}
