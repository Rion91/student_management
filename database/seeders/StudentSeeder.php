<?php

namespace Database\Seeders;

use App\Data\Models\Student;
use Illuminate\Database\Seeder;

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
    }
}
