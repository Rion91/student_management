<?php

namespace Tests\Feature\Services\Auth;

use Tests\TestCase;

class LoginFeatureTest extends TestCase
{
    public function test_login_feature()
    {
        $this->withHeaders([
            'Accept' => 'application/json',
            'X-Requested-With' => 'XMLHttpRequest',
        ])->postJson('/api/auth/login', [
            'email' => config('onenex.admin_email'),
            'password' => config('onenex.admin_password'),
        ])->assertStatus(200);
    }
}
