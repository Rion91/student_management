<?php

namespace Tests\Feature\Services\Students;

use App\Data\Models\Student;
use App\Models\User;
use Tests\TestCase;

class StoreStudentFeatureTest extends TestCase
{
    public function test_store_student_feature()
    {
        $user = User::where('email', config('onenex.admin_email'))->first();
        $token = $user->createToken('Authentication Token')->accessToken;

        $this->withHeaders([
            'Authorization' => 'Bearer '.$token,
            'Accept' => 'application/json',
            'X-Requested-With' => 'XMLHttpRequest',
        ])->json('POST', '/api/students', [
            'name' => 'test name',
            'email' => 'test.feature@gmail.com',
            'password' => 'password',
            'confirm_password' => 'password',
            'date_of_birth' => fake()->date,
            'mobile_number' => '82695314712',
            'identity_type' => 'NRC',
            'identity_number' => '378492',
            'gender' => 'MALE',
            'nationality' => 'Myanmar',
            'academic_field' => 'Computer Science',
            'contact_person' => 'contact person test',
            'contact_number' => '12340988746',
            'address' => 'test, test street, test township, test city',
            'status' => 'ACTIVE',
            'avatar' => '',
        ])->assertStatus(200);

        User::whereName('test name')->forceDelete();
        Student::whereIdentityNumber('378492')->forceDelete();
    }
}
