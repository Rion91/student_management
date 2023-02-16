<?php

namespace Tests\Feature\Services\Students;

use App\Data\Models\Student;
use App\Models\User;
use Tests\TestCase;

class ShowStudentFeatureTest extends TestCase
{
    public function test_show_student_feature()
    {
        $user = User::where('email', config('onenex.admin_email'))->first();
        $student = Student::factory()->create();
        $token = $user->createToken('Authentication Token')->accessToken;
        $this->withHeaders([
            'Authorization' => 'Bearer '.$token,
            'Accept' => 'application/json',
            'X-Requested-With' => 'XMLHttpRequest',
        ])->json('GET', '/api/students/'.$student->id)
            ->assertStatus(200);
        $student->forceDelete();
    }
}
