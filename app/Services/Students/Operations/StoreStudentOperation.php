<?php

namespace App\Services\Students\Operations;

use App\Domains\Students\Jobs\StoreStudentJob;
use App\Domains\User\Jobs\StoreUserJob;
use Lucid\Units\Operation;

class StoreStudentOperation extends Operation
{
    public array $userPayload;

    public array $studentPayload;

    const CONST_ACTIVE = 'ACTIVE';

    /**
     * Create a new operation instance.
     *
     * @return void
     */
    public function __construct($userPayload, $studentPayload)
    {
        $this->userPayload = $userPayload;
        $this->studentPayload = $studentPayload;
    }

    /**
     * Execute the operation.
     *
     * @return object
     */
    public function handle(): object
    {
        $response = $this->run(StoreUserJob::class, ['payload' => $this->userPayload, 'roleName' => 'student']);

        $this->studentPayload['user_id'] = $response->id;
        $this->studentPayload['status'] = self::CONST_ACTIVE;

        return $this->run(StoreStudentJob::class, ['payload' => $this->studentPayload]);
    }
}
