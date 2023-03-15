<?php

namespace DD4You\Dpanel\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Setting extends Model
{
    protected $guarded = ['id'];
    protected $table = 'settings';

    public function set($key, $valueArr = null)
    {
        if (is_array($key)) {
            foreach ($key as $k => $v) {
                $this->set($k, $v);
            }

            return true;
        }

        $settings = $this->getModelName()->updateOrCreate(
            ['key' => $key],
            ['label' => $valueArr['label'], 'value' => $valueArr['value']]
        );
        $this->forgetCache();

        return $settings;
    }

    public function getModelName()
    {
        return app('\DD4You\Dpanel\Models\Setting');
    }

    public function forgetCache()
    {
        Cache::forget($this->getCacheName());
    }

    public function getCacheName(): string
    {
        return 'dpanel-settings';
    }
    public function get($key, $default = null, $fetch = false)
    {
        if (is_array($key)) {
            return $this->getMany($key, $fetch);
        }

        return $this->getAll($fetch)->get($key, $default);
    }

    public function getMany($keys, $fetch)
    {
        return $this->getAll($fetch)->only($keys);
    }

    public function getAll($fetch = false)
    {
        if ($fetch) {
            $settings = $this->getModelName()->pluck('key', 'label', 'value');
        } else {
            $settings = Cache::rememberForever($this->getCacheName(), function () {
                return $this->getModelName()->pluck('key', 'label', 'value');
            });
        }

        return $settings;
    }



    public function remove($key)
    {
        if (is_array($key)) {
            foreach ($key as $k) {
                $this->delete($k);
            }

            return true;
        }
        $this->getModelName()->where('key', $key)->delete();
        $this->forgetCache();
    }

    public function has($key)
    {
        return $this->getAll()->has($key);
    }
}
