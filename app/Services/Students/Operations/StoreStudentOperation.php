<?php

namespace App\Services\Students\Operations;

use App\Domains\Auth\Jobs\LoginJob;
use App\Domains\Students\Jobs\StoreStudentJob;
use App\Domains\User\Jobs\StoreUserJob;
use Illuminate\Support\Facades\DB;
use Lucid\Units\Operation;

class StoreStudentOperation extends Operation
{
    private array $userPayload;

    private array $studentPayload;

    private const CONST_ACTIVE = 'ACTIVE';

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
     * @return object|array
     */
    public function handle(): object|array
    {
        DB::beginTransaction();
        try {
            $response = $this->run(StoreUserJob::class, ['payload' => $this->userPayload, 'roleName' => 'student']);

            $this->studentPayload['user_id'] = $response->id;
            $this->studentPayload['status'] = self::CONST_ACTIVE;
            $this->run(StoreStudentJob::class, ['payload' => $this->studentPayload]);

            $loginData = $this->run(LoginJob::class, ['payload' => $this->userPayload]);
            if ($loginData) {
                DB::commit();

                return ['status' => 'success', 'data' => $loginData];
            }
        } catch (\Throwable $throwable) {
            DB::rollBack();

            return ['status' => 'fail', 'data' => $throwable->getMessage()];
        }

        return [];
    }
}
