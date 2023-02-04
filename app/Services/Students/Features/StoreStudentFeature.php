<?php

namespace App\Services\Students\Features;

use App\Domains\Students\Requests\StoreStudentRequest;
use App\Helpers\JsonResponder;
use App\Services\Students\Operations\StoreStudentOperation;
use Illuminate\Http\JsonResponse;
use Lucid\Units\Feature;

class StoreStudentFeature extends Feature
{
    const CONST_ACTIVE = 'ACTIVE';

    public function handle(StoreStudentRequest $request): JsonResponse
    {
        $response = $this->run(StoreStudentOperation::class,
            [
                'userPayload' => $request->only(['name', 'email', 'password']),
                'studentPayload' => $request->except(['name', 'email', 'password']),
            ]
        );
        if ($response['status'] == 'success') {
            return JsonResponder::success('Successfully registering a student!', $response['data']);
        }

        return JsonResponder::internalServerError('Registration Failed', $response['data']);
    }
}
