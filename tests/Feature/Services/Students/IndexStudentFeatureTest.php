<?php

namespace Tests\Feature\Services\Students;

use App\Models\User;
use Tests\TestCase;

class IndexStudentFeatureTest extends TestCase
{
    public function test_index_student_feature()
    {
        $user = User::where('email', config('onenex.admin_email'))->first();
        $token = $user->createToken('Authentication Token')->accessToken;

        $this->withHeaders([
            'Authorization' => 'Bearer '.$token,
            'Accept' => 'application/json',
            'X-Requested-With' => 'XMLHttpRequest',
        ])->json('GET', '/api/students')
            ->assertStatus(200);
    }
}
