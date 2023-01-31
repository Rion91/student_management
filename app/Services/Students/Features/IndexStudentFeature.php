<?php

namespace App\Services\Students\Features;

use App\Domains\Students\Jobs\IndexStudentJob;
use App\Helpers\JsonResponder;
use Illuminate\Http\JsonResponse;
use Lucid\Units\Feature;

class IndexStudentFeature extends Feature
{
    public function handle(): JsonResponse
    {
        $response = $this->run(IndexStudentJob::class);

        return JsonResponder::success('All student data are successfully fetched.', $response);
    }
}
