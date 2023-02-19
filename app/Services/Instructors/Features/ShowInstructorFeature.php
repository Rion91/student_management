<?php

namespace App\Services\Instructors\Features;

use App\Domains\Instructors\Jobs\ShowInstructorJob;
use App\Helpers\JsonResponder;
use Lucid\Units\Feature;

class ShowInstructorFeature extends Feature
{
    private string $instructorId;

    public function __construct($instructorId)
    {
        $this->instructorId = $instructorId;
    }

    public function handle()
    {
        $response = $this->run(ShowInstructorJob::class, ['instructorId' => $this->instructorId]);

        return JsonResponder::success('Instructor information is retrieved.', $response);
    }
}
