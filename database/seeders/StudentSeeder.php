<?php

namespace Database\Seeders;

use App\Data\Models\Student;
use App\Enums\RoleEnum;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Student::truncate();

        $this->command->warn('  Creating student account');

        Student::factory()->count(10)->create();

        $this->command->warn('  Attaching student role to created student account');
        $role = Role::where('name', RoleEnum::STUDENT->value)->firstOrFail();
        $role->syncPermissions(config('core.student-permissions'));
    }
}
