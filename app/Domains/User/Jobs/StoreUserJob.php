<?php

namespace App\Domains\User\Jobs;

use App\Models\User;
use Lucid\Units\Job;

class StoreUserJob extends Job
{
    private array $payload;

    private string $roleName;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($payload, $roleName)
    {
        $this->payload = $payload;
        $this->roleName = $roleName;
    }

    /**
     * Execute the job.
     *
     * @return object
     */
    public function handle(): object
    {
        return User::create($this->payload)->syncRoles([$this->roleName]);
    }
}
