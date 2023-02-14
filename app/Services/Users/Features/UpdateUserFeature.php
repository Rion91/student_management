<?php

namespace App\Services\Users\Features;

use App\Domains\User\Jobs\UpdateUserJob;
use App\Domains\User\Requests\UpdateUserRequest;
use App\Helpers\JsonResponder;
use Illuminate\Http\JsonResponse;
use Lucid\Units\Feature;

class UpdateUserFeature extends Feature
{
    private string $userId;

    public function __construct($userId)
    {
        $this->userId = $userId;
    }

    public function handle(UpdateUserRequest $request): JsonResponse
    {
        $this->run(UpdateUserJob::class, ['userId' => $this->userId, 'payload' => $request->validated()]);

        return JsonResponder::success('User data has been updated successfully!');
    }
}
