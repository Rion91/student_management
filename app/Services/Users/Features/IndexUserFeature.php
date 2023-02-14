<?php

namespace App\Services\Users\Features;

use App\Domains\User\Jobs\IndexUserJob;
use App\Helpers\JsonResponder;
use Illuminate\Http\JsonResponse;
use Lucid\Units\Feature;

class IndexUserFeature extends Feature
{
    public function handle(): JsonResponse
    {
        $response = $this->run(IndexUserJob::class);

        return JsonResponder::success('All user data are successfully fetched.', $response);
    }
}
