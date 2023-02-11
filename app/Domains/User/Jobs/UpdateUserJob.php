<?php

namespace App\Domains\User\Jobs;

use App\Models\User;
use Lucid\Units\Job;

class UpdateUserJob extends Job
{
    private array $payload;

    private string $userId;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($payload, $userId)
    {
        $this->payload = $payload;
        $this->userId = $userId;
    }

    /**
     * Execute the job.
     *
     * @return object|bool
     */
    public function handle(): object|bool
    {
        return User::find($this->userId)->update($this->payload);
    }
}
