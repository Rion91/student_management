<?php

namespace App\Services\Users\Features;

use App\Domains\User\Jobs\StoreUserJob;
use App\Domains\User\Requests\StoreUserRequest;
use App\Helpers\JsonResponder;
use Illuminate\Http\JsonResponse;
use Lucid\Units\Feature;

class StoreUserFeature extends Feature
{
    public function handle(StoreUserRequest $request): JsonResponse
    {
        $response = $this->run(StoreUserJob::class, [
            'payload' => $request->except('role'),
            'roleName' => $request->only('role')['role'],
        ]);

        return JsonResponder::success('User data has been created successfully!', $response);
    }
}
