<?php

namespace App\Services\Students\Features;

use App\Domains\Students\Jobs\DeleteStudentJob;
use App\Helpers\JsonResponder;
use Illuminate\Http\JsonResponse;
use Lucid\Units\Feature;

class DeleteStudentFeature extends Feature
{
    private string $studentId;

    public function __construct($studentId)
    {
        $this->studentId = $studentId;
    }

    public function handle(): JsonResponse
    {
        $this->run(DeleteStudentJob::class, ['studentId' => $this->studentId]);

        return JsonResponder::success('Student information deleted.');
    }
}
