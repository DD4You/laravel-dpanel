[![Latest Stable Version](http://poser.pugx.org/dd4you/dpanel/v)](https://packagist.org/packages/dd4you/dpanel)
[![Daily Downloads](http://poser.pugx.org/dd4you/dpanel/d/daily)](https://packagist.org/packages/dd4you/dpanel)
[![Monthly Downloads](http://poser.pugx.org/dd4you/dpanel/d/monthly)](https://packagist.org/packages/dd4you/dpanel)
[![Total Downloads](http://poser.pugx.org/dd4you/dpanel/downloads)](https://packagist.org/packages/dd4you/dpanel)
[![License](http://poser.pugx.org/dd4you/dpanel/license)](https://packagist.org/packages/dd4you/dpanel)
[![PHP Version Require](http://poser.pugx.org/dd4you/dpanel/require/php)](https://packagist.org/packages/dd4you/dpanel)

# DPanel Package with [Global Setting](#global-settings)

## You can follow this video tutorial as well for installation.

[<img src="https://img.youtube.com/vi/MYtUdT-vPBI/0.jpg" width="250">](https://youtu.be/MYtUdT-vPBI)

## Watch Other Lavavel tutorial here

[<img src="https://img.youtube.com/vi/MYtUdT-vPBI/0.jpg" width="580">](https://www.youtube.com/channel/UCJow0oaJRC3dWIXIdVcm6Qg?sub_confirmation=1))

## This is modern Admin Panel developed By DD4You.in with tailwind css. It's help to create admin panel with prebuild login system

![dpanel](https://user-images.githubusercontent.com/41217230/209454903-0a8692ff-f9c0-481f-975a-a2cc3f86920a.png)

Install Package via composer

    composer require dd4you/dpanel

Publish

    php artisan dd4you:install-dpanel

Add Seeder

    $this->call(\DD4You\Dpanel\database\seeders\DpanelSeeder::class);

Install Tailwind Css if not install

    https://tailwindcss.com/docs/guides/laravel

Add Below code in tailwind.config.js

    "./vendor/dd4you/dpanel/src/resources/**/*.blade.php",

# Global Settings

Store general settings like website name, logo url, contacts in the database easily.
Everything is cached, so no extra query is done.
You can also get fresh values from the database directly if you need.

## Installation

Migrate the database

```bash
php artisan migrate
```

I have also added seeder for some general settings a website needs.
Seed the database using command:

```code
php artisan db:seed --class=SettingsSeeder
```

## Usage/Examples

To store settings on database

```code
settings()->set(
        'key',
        ['label'=>'Label Name','value'=>'Value Name']
    );
```

You can also set multiple settings at once

```code
settings()->set([
        'key1'=>[
            'label'=>'Label Name',
            'value'=>'Value Name',
            'type'=>settings()->fileType()
            ],
        'key2'=>[
            'label'=>'Label Name',
            'value'=>'Value Name'
            ],
    ]);
```

You can retrieve the settings from cache using any command below

```code
settings('key');
settings()->get('key');
settings()->get(['key1', 'key2']);
```

Want the settings directly from database? You can do it,

```code
settings('key',true);
settings()->get('key',true);
settings()->get(['key1', 'key2'],true);
```

Getting all the settings stored on database

```code
settings()->getAll();
```

You can use the settings on blade as

```code
{{ settings('site_name')['value'] }}
```

Or, if you have html stored on settings

```code
{!! settings('footer_text')['value'] !!}
{!! settings('footer_text')['value'] Copyright Date('Y') !!}
```

Finally, If you have changed something directly on database, Don't forget to clear the cache.

```code
php artisan cache:clear
```

## License

[MIT](https://choosealicense.com/licenses/mit/)

## Feedback

If you have any feedback, please reach out at vinay@dd4you.in or submit a pull request here.

## Authors

- [@dd4you](https://www.github.com/DD4You)

## Badges

[![MIT License](https://img.shields.io/badge/License-MIT-green.svg)](https://choosealicense.com/licenses/mit/)
