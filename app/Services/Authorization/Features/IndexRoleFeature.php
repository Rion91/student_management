<?php

namespace App\Services\Authorization\Features;

use App\Domains\Authorization\Jobs\IndexRoleJob;
use App\Helpers\JsonResponder;
use Illuminate\Http\JsonResponse;
use Lucid\Units\Feature;

class IndexRoleFeature extends Feature
{
    public function handle(): JsonResponse
    {
        $roles = $this->run(IndexRoleJob::class);

        return JsonResponder::success('Roles has been retrieved successfully', $roles);
    }
}
