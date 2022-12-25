<?php

namespace DD4You\Dpanel\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class InstallDpanel extends Command
{
    protected $signature = 'dd4you:install-dpanel';

    protected $description = 'Publish DPanel file for Admin Panel.';

    public function handle()
    {
        $this->info('Installing DPanel...');


        # PUBLISH configuration file
        $this->info('Publishing configuration file...');
        if (!self::isExists('config\dpanel.php')) {
            self::publishConfig('dpanel.php');
            $this->info('Published configuration file');
        } else {
            if ($this->shouldOverwrite('Config')) {
                $this->info('Overwriting configuration file...');
                self::publishConfig('dpanel.php');
            } else {
                $this->info('Existing configuration file was not overwritten');
            }
        }
        # PUBLISH configuration file END


        # PUBLISH app.css
        $this->info('Publishing css file...');
        if (!self::isExists('resources\css\app.css')) {
            self::publishCss('app.css');
            $this->info('Published css');
        } else {
            if ($this->shouldOverwrite('CSS')) {
                $this->info('Overwriting css file...');
                self::publishCss('app.css');
            } else {
                $this->info('Existing css file was not overwritten');
            }
        }
        # PUBLISH app.css END


        # PUBLISH dpanel.php
        $this->info('Publishing dpanel route file...');
        if (!self::isExists('routes\dpanel.php')) {
            self::publishDpanel('dpanel.php');
            $this->info('Published dpanel route file');
        } else {
            if ($this->shouldOverwrite('D Panel route')) {
                $this->info('Overwriting dpanel route file...');
                self::publishDpanel('dpanel.php');
            } else {
                $this->info('Existing dpanel route file was not overwritten');
            }
        }
        # PUBLISH dpanel.php END


        # PUBLISH DashboardController.php
        $this->info('Publishing dpanel controller file...');
        if (!self::isExists('app\Http\Controllers\Dpanel\dpanel.php')) {
            self::publishDpanelController('DashboardController.php');
            $this->info('Published dpanel controller file');
        } else {
            if ($this->shouldOverwrite('D Panel controller')) {
                $this->info('Overwriting dpanel controller file...');
                self::publishDpanelController('DashboardController.php');
            } else {
                $this->info('Existing dpanel controller file was not overwritten');
            }
        }
        # PUBLISH DashboardController.php END

        # PUBLISH app.blade.php and dashboard.blade.php
        $this->info('Publishing Dpanel Ui file...');

        if (!self::isExists('resources\views\dpanel\layouts\app.blade.php')) {
            self::publishDpanelAppLayout('app.blade.php');
            $this->info('Published Dpanel app layout');
        } else {
            if ($this->shouldOverwrite('Dpanel App Layout')) {
                $this->info('Overwriting Dpanel app layout file...');
                self::publishDpanelAppLayout('app.blade.php');
            } else {
                $this->info('Existing Dpanel app layout file was not overwritten');
            }
        }
        if (!self::isExists('resources\views\dpanel\dashboard.blade.php')) {
            self::publishDpanelApp('dashboard.blade.php');
            $this->info('Published Dpanel dashboard');
        } else {
            if ($this->shouldOverwrite('Dpanel dashboard')) {
                $this->info('Overwriting Dpanel dashboard file...');
                self::publishDpanelApp('dashboard.blade.php');
            } else {
                $this->info('Existing Dpanel dashboard file was not overwritten');
            }
        }
        self::publishAssets();
        # PUBLISH app.blade.php and dashboard.blade.php END


        $this->info('Installed DPanel');
    }


    protected static function getContent($fileName, $prefix = "")
    {
        // $extension = pathinfo($fileName, PATHINFO_EXTENSION);
        return file_get_contents(__DIR__ . "/stubs/$prefix$fileName.stub");
    }
    protected static function isExists($fileName)
    {
        return File::exists(base_path($fileName));
    }
    protected static function createFile($path, $fileName, $contents)
    {
        if (!file_exists($path)) mkdir($path, 0755, true);

        $path = $path . $fileName;

        file_put_contents($path, $contents);
    }
    protected function shouldOverwrite($fileName)
    {
        return $this->confirm(
            $fileName . ' file already exists. Do you want to overwrite it?',
            false
        );
    }



    protected static function publishConfig($fileName)
    {
        self::createFile(config_path() . DIRECTORY_SEPARATOR, $fileName, self::getContent($fileName, 'config_'));
    }
    protected static function publishCss($fileName)
    {
        self::createFile(resource_path('css') . DIRECTORY_SEPARATOR, $fileName, self::getContent($fileName));
    }
    protected static function publishDpanel($fileName)
    {
        self::createFile(base_path('routes') . DIRECTORY_SEPARATOR, $fileName, self::getContent($fileName));
    }
    protected static function publishDpanelController($fileName)
    {
        self::createFile(app_path('Http/Controllers/Dpanel') . DIRECTORY_SEPARATOR, $fileName, self::getContent($fileName));
    }

    protected static function publishDpanelAppLayout($fileName)
    {
        self::createFile(resource_path('views/dpanel/layouts') . DIRECTORY_SEPARATOR, $fileName, self::getContent($fileName));
    }
    protected static function publishDpanelApp($fileName)
    {
        self::createFile(resource_path('views/dpanel') . DIRECTORY_SEPARATOR, $fileName, self::getContent($fileName));
    }

    protected function publishAssets($forcePublish = false)
    {
        $params = [
            '--provider' => "DD4You\Dpanel\DpanelServiceProvider",
            '--tag' => "dpanel-asset"
        ];

        if ($forcePublish === true) {
            $params['--force'] = true;
        }

        $this->call('vendor:publish', $params);
    }
}
