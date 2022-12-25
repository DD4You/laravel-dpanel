<?php

namespace DD4You\Dpanel\database\seeders;

use DD4You\Dpanel\Models\Dpanel;
use Illuminate\Database\Seeder;

class DpanelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Dpanel::create([
            'fname' => config('dpanel.first_name'),
            'lname' => config('dpanel.last_name'),
            'email' => config('dpanel.email'),
            'password' => bcrypt(config('dpanel.password'))
        ]);
    }
}
