<?php

namespace Tests\Feature\Services\Students;

use App\Data\Models\Student;
use App\Models\User;
use Tests\TestCase;

class UpdateStudentFeatureTest extends TestCase
{
    public function test_update_student_feature()
    {
        $user = User::where('email', config('onenex.admin_email'))->first();
        $student = Student::factory()->create();
        $token = $user->createToken('Authentication Token')->accessToken;
        $this->withHeaders([
            'Authorization' => 'Bearer '.$token,
            'Accept' => 'application/json',
            'X-Requested-With' => 'XMLHttpRequest',
        ])->json('PUT', '/api/students/'.$student->id, [
            'name' => 'update name',
            'email' => 'edit.feature@gmail.com',
            'password' => 'password',
            'confirm_password' => 'password',
            'date_of_birth' => fake()->date,
            'mobile_number' => '82695314863',
            'identity_type' => 'NRC',
            'identity_number' => '167540',
            'gender' => 'FEMALE',
            'nationality' => 'Myanmar',
            'academic_field' => 'Computer Science',
            'contact_person' => 'contact person test',
            'contact_number' => '12340988746',
            'address' => 'edit, edit street, edit township, edit city',
            'status' => 'ACTIVE',
            'avatar' => '',
        ])->assertStatus(200);

        User::whereName('update name')->forceDelete();
        Student::whereIdentityNumber('167540')->forceDelete();
    }
}
