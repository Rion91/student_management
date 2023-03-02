<?php

namespace App\Services\Instructors\Features;

use App\Domains\Instructors\Requests\UpdateInstructorRequest;
use App\Helpers\JsonResponder;
use App\Services\Instructors\Operations\UpdateInstructorOperation;
use Illuminate\Http\JsonResponse;
use Lucid\Units\Feature;

class UpdateInstructorFeature extends Feature
{
    private string $instructorId;

    public function __construct($instructorId)
    {
        $this->instructorId = $instructorId;
    }

    public function handle(UpdateInstructorRequest $request): JsonResponse
    {
        $response = $this->run(
            UpdateInstructorOperation::class,
            [
                'instructorId' => $this->instructorId,
                'userPayload' => $request->only(['name', 'email', 'password']),
                'instructorPayload' => $request->except(['name', 'email', 'password']),
            ]
        );

        if ($response['status'] === 'success') {
            return JsonResponder::success('Instructor information has been updated successfully!');
        }

        return JsonResponder::internalServerError('Instructor information update Failed', $response['data']);
    }
}
