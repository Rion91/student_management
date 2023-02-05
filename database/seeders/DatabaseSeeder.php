<?php

namespace Database\Seeders;

use App\Data\Models\Student;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /*if (config('core.lucid_application_providers')) {
            $this->call(ApplicationServiceSeeder::class);
        }*/

        $this->call([
            PermissionAndRoleSeeder::class,
            SuperAdminSeeder::class,
            StudentSeeder::class,
        ]);

//        User::factory(10)->create();
//        Student::factory()->count(10)->create();
    }
}
