<?php

namespace App\Services\Users\Features;

use App\Domains\User\Jobs\DeleteUserJob;
use App\Helpers\JsonResponder;
use Illuminate\Http\JsonResponse;
use Lucid\Units\Feature;

class DeleteUserFeature extends Feature
{
    private string $userId;

    public function __construct($userId)
    {
        $this->userId = $userId;
    }

    public function handle(): JsonResponse
    {
        $this->run(DeleteUserJob::class, ['userId' => $this->userId]);

        return JsonResponder::success('User data has been deleted.');
    }
}
