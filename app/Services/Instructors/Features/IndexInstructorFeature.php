<?php

namespace App\Services\Instructors\Features;

use App\Domains\Instructors\Jobs\IndexInstructorJob;
use App\Helpers\JsonResponder;
use Illuminate\Http\JsonResponse;
use Lucid\Units\Feature;

class IndexInstructorFeature extends Feature
{
    public function handle(): JsonResponse
    {
        $response = $this->run(IndexInstructorJob::class);

        return JsonResponder::success('All instructor data are successfully fetched.', $response);
    }
}
