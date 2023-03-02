<?php

namespace App\Services\Instructors\Operations;

use App\Data\Models\Instructor;
use App\Domains\Instructors\Jobs\UpdateInstructorJob;
use App\Domains\User\Jobs\UpdateUserJob;
use Illuminate\Support\Facades\DB;
use Lucid\Units\Operation;

class UpdateInstructorOperation extends Operation
{
    /**
     * @var string instructorId
     */
    private string $instructorId;

    /**
     * @var array userPayload
     */
    private array $userPayload;

    /**
     * @var array instructorPayload
     */
    private array $instructorPayload;

    /**
     * Create a new operation instance.
     *
     * @return void
     */
    public function __construct($instructorId, $userPayload, $instructorPayload)
    {
        $this->instructorId = $instructorId;
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
            $instructor = Instructor::whereId($this->instructorId)->first();
            $this->run(UpdateUserJob::class, ['userId' => $instructor->user_id, 'payload' => $this->userPayload]);

            $data = $this->run(UpdateInstructorJob::class, ['instructorId' => $this->instructorId, 'payload' => $this->instructorPayload]);
            if ($data) {
                DB::commit();

                return ['status' => 'success', 'data' => $data];
            }
        } catch (\Throwable $throwable) {
            DB::rollBack();

            return ['status' => 'fail', 'data' => $throwable->getMessage()];
        }

        return [];
    }
}
