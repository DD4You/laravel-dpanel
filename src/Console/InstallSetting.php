<?php

namespace DD4You\Dpanel\Console;

use Illuminate\Console\Command;

class InstallSetting extends Command
{
    protected $signature = 'dd4you:install-global-setting';

    protected $description = 'Publish Setting file';

    public function handle()
    {
        $this->info('Installing Setting...');

        $params = [
            '--provider' => "DD4You\Dpanel\DpanelServiceProvider",
            '--tag' => "migrations"
        ];
        $this->call('vendor:publish', $params);

        $this->info('Installed Setting');
    }
}
