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
        $user = User::updateOrCreate(
            ['email' => config('onenex.admin_email')],
            ['name' => 'Admin', 'password' => config('onenex.admin_password')]);

        $this->command->warn('  Attaching super-admin role to created user');
        $user->syncRoles([RoleEnum::SUPER_ADMIN->value]);
    }
}
