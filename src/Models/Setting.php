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
            [
                'type' => $valueArr['type'] ?? $this->textType(),
                'label' => $valueArr['label'],
                'value' => $valueArr['value'],
            ]
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
    public function get(mixed $key, $fetch = false)
    {
        $settings = $this->getAll($fetch)->toArray();
        $filterSetting = is_array($key) ? [] : null;
        foreach ($settings as $setting) {
            if (is_array($key)) {
                foreach ($key as $k1) {
                    if (in_array($k1, array_values($setting))) {
                        $filterSetting[] = $setting;
                    }
                }
            } else {
                if (in_array($key, array_values($setting))) {
                    $filterSetting = $setting;
                }
            }
        }
        return $filterSetting;
    }



    public function getAll($fetch = false)
    {
        if ($fetch) {
            $settings = $this->getModelName()->all(['key', 'type', 'label', 'value']);
        } else {
            $settings = Cache::rememberForever($this->getCacheName(), function () {
                return $this->getModelName()->all(['key', 'type', 'label', 'value']);
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

    public function textType()
    {
        return 'text';
    }

    public function fileType()
    {
        return 'file';
    }
}
