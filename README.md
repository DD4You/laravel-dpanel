[![Latest Stable Version](http://poser.pugx.org/dd4you/dpanel/v)](https://packagist.org/packages/dd4you/dpanel)
[![Daily Downloads](http://poser.pugx.org/dd4you/dpanel/d/daily)](https://packagist.org/packages/dd4you/dpanel)
[![Monthly Downloads](http://poser.pugx.org/dd4you/dpanel/d/monthly)](https://packagist.org/packages/dd4you/dpanel)
[![Total Downloads](http://poser.pugx.org/dd4you/dpanel/downloads)](https://packagist.org/packages/dd4you/dpanel)
[![License](http://poser.pugx.org/dd4you/dpanel/license)](https://packagist.org/packages/dd4you/dpanel)
[![PHP Version Require](http://poser.pugx.org/dd4you/dpanel/require/php)](https://packagist.org/packages/dd4you/dpanel)

# DPanel Package

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
