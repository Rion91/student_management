<?php

namespace App\Services\Students\Features;

use App\Domains\Students\Jobs\ShowStudentJob;
use App\Helpers\JsonResponder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Lucid\Units\Feature;

class ShowStudentFeature extends Feature
{
    private string $studentId;

    public function __construct($studentId)
    {
        $this->studentId = $studentId;
    }

    public function handle(Request $request): JsonResponse
    {
        $response = $this->run(ShowStudentJob::class, ['studentId' => $this->studentId]);

        return JsonResponder::success('Student information is retrieved.', $response);
    }
}
