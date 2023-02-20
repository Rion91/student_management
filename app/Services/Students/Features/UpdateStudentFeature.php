<?php

namespace App\Services\Students\Features;

use App\Domains\Students\Requests\UpdateStudentRequest;
use App\Helpers\JsonResponder;
use App\Services\Students\Operations\UpdateStudentOperation;
use Illuminate\Http\JsonResponse;
use Lucid\Units\Feature;

class UpdateStudentFeature extends Feature
{
    private string $studentId;

    public function __construct($studentId)
    {
        $this->studentId = $studentId;
    }

    public function handle(UpdateStudentRequest $request): JsonResponse
    {
        $response = $this->run(UpdateStudentOperation::class,
            [
                'studentId' => $this->studentId,
                'userPayload' => $request->only(['name', 'email', 'password']),
                'studentPayload' => $request->except(['name', 'email', 'password']),
            ]);

        if ($response['status'] === 'success') {
            return JsonResponder::success('Student information has been updated successfully!');
        }

        return JsonResponder::internalServerError('Student information update Failed', $response['data']);
    }
}
