<?php

namespace Database\Seeders;

use App\Enums\RoleEnum;
use App\Models\User;
use Illuminate\Database\Seeder;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->warn('  Creating and super-admin account');
        $user = User::updateOrCreate(['email' => env('ADMIN_EMAIL')], ['name' => 'Admin', env('ADMIN_PASSWORD') => 'password']);

        $this->command->warn('  Attaching super-admin role to created user');
        $user->syncRoles([RoleEnum::SUPER_ADMIN->value]);
    }
}
