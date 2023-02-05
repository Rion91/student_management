<?php

namespace Database\Factories;

use App\Data\Models\Student;
use App\Enums\AcademicFieldMajor;
use App\Enums\GenderEnum;
use App\Enums\RoleEnum;
use App\Enums\StudentIdentityTypeEnum;
use App\Enums\UserStatusEnum;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class StudentFactory extends Factory
{
    protected $model = Student::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory()->create()->syncRoles([RoleEnum::STUDENT->value]),
            'date_of_birth' => fake()->date,
            'mobile_number' => fake()->phoneNumber,
            'identity_type' => fake()->randomElement(collect(StudentIdentityTypeEnum::class)->enum()->values()),
            'identity_number' => Str::random(6),
            'gender' => fake()->randomElement(collect(GenderEnum::class)->enum()->values()),
            'nationality' => fake()->country,
            'academic_field' => fake()->randomElement(collect(AcademicFieldMajor::class)->enum()->values()),
            'contact_person' => fake()->name,
            'contact_number' => fake()->phoneNumber,
            'address' => fake()->address,
            'status' => fake()->randomElement(collect(UserStatusEnum::class)->enum()->values()),
        ];
    }
}
