<?php

namespace DD4You\Dpanel\database\seeders;

use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => config('dpanel.first_name') . ' ' . config('dpanel.last_name'),
            'email' => config('dpanel.email'),
            'password' => bcrypt(config('dpanel.password')),
            'role' => UserRole::ADMIN,
        ]);
    }
}
