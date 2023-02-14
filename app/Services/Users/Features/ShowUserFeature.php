<?php

namespace App\Services\Users\Features;

use App\Domains\User\Jobs\ShowUserJob;
use App\Helpers\JsonResponder;
use Illuminate\Http\JsonResponse;
use Lucid\Units\Feature;

class ShowUserFeature extends Feature
{
    private string $userId;

    public function __construct($userId)
    {
        $this->userId = $userId;
    }

    public function handle(): JsonResponse
    {
        $response = $this->run(ShowUserJob::class, ['userId' => $this->userId]);

        return JsonResponder::success('User information is retrieved.', $response);
    }
}
