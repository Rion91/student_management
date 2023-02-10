<?php

namespace App\Services\Students\Features;

use App\Domains\Students\Jobs\UpdateStudentJob;
use App\Domains\Students\Requests\UpdateStudentRequest;
use App\Helpers\JsonResponder;
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
        $response = $this->run(UpdateStudentJob::class, ['studentId' => $this->studentId, 'payload' => $request->validated()]);

        return JsonResponder::success('Student information has updated successfully!', $response);
    }
}
