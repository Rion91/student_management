<?php

namespace App\Services\Students\Operations;

use App\Domains\Instructors\Jobs\StoreInstructorJob;
use App\Domains\User\Jobs\StoreUserJob;
use Illuminate\Support\Facades\DB;
use Lucid\Units\Operation;

class StoreInstructorOperation extends Operation
{
    private const CONST_ACTIVE = 'ACTIVE';

    private array $userPayload;

    private array $instructorPayload;

    /**
     * Create a new operation instance.
     *
     * @return void
     */
    public function __construct($userPayload, $instructorPayload)
    {
        $this->userPayload = $userPayload;
        $this->instructorPayload = $instructorPayload;
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
            $response = $this->run(StoreUserJob::class, ['payload' => $this->userPayload, 'roleName' => 'instructor']);

            $this->instructorPayload['user_id'] = $response->id;
            $this->instructorPayload['status'] = self::CONST_ACTIVE;
            $data = $this->run(StoreInstructorJob::class, ['payload' => $this->instructorPayload]);

            if ($data) {
                DB::commit();

                return [
                    'status' => 'success',
                    'data' => $data,
                ];
            }
        } catch (\Throwable $throwable) {
            DB::rollBack();

            return [
                'status' => 'fail',
                'data' => $throwable->getMessage(),
            ];
        }

        return [];
    }
}
