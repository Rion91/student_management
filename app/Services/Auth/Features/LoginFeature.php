<?php

namespace App\Services\Auth\Features;

use App\Domains\Auth\Jobs\LoginJob;
use App\Domains\Auth\Requests\LoginRequest;
use App\Helpers\JsonResponder;
use Illuminate\Http\JsonResponse;
use Lucid\Units\Feature;

class LoginFeature extends Feature
{
    public function handle(LoginRequest $request): JsonResponse
    {
        $response = $this->run(LoginJob::class, ['payload' => $request->validated()]);

        return JsonResponder::success('Logged in successfully', $response);
    }
}
