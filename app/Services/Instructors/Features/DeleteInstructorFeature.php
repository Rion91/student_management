<?php

namespace App\Services\Instructors\Features;

use App\Domains\Instructors\Jobs\DeleteInstructorJob;
use App\Helpers\JsonResponder;
use Illuminate\Http\JsonResponse;
use Lucid\Units\Feature;

class DeleteInstructorFeature extends Feature
{
    private string $instructorId;

    public function __construct($instructorId)
    {
        $this->instructorId = $instructorId;
    }

    public function handle(): JsonResponse
    {
        $this->run(DeleteInstructorJob::class, ['instructorId' => $this->instructorId]);

        return JsonResponder::success('Student information has been deleted.');
    }
}
