<?php

namespace App\Domains\User\Jobs;

use App\Models\User;
use Lucid\Units\Job;

class ShowUserJob extends Job
{
    private string $userId;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($userId)
    {
        $this->userId = $userId;
    }

    /**
     * Execute the job.
     *
     * @return object
     */
    public function handle(): object
    {
        return User::findOrFail($this->userId);
    }
}
