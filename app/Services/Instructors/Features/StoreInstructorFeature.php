<?php

namespace App\Services\Instructors\Features;

use App\Domains\Instructors\Requests\StoreInstructorRequest;
use App\Helpers\JsonResponder;
use App\Services\Students\Operations\StoreInstructorOperation;
use Illuminate\Http\JsonResponse;
use Lucid\Units\Feature;

class StoreInstructorFeature extends Feature
{
    public function handle(StoreInstructorRequest $request): JsonResponse
    {
        $response = $this->run(
            StoreInstructorOperation::class,
            [
                'userPayload' => $request->only(['name', 'email', 'password']),
                'instructorPayload' => $request->except(['name', 'email', 'password']),
            ]
        );
        if ($response['status'] === 'success') {
            return JsonResponder::success('Successfully creating a instructor!', $response['data']);
        }

        return JsonResponder::internalServerError('Creating Failed', $response['data']);
    }
}
