<?php

namespace App\Services\Students\Operations;

use App\Data\Models\Student;
use App\Domains\Students\Jobs\UpdateStudentJob;
use App\Domains\User\Jobs\UpdateUserJob;
use Illuminate\Support\Facades\DB;
use Lucid\Units\Operation;

class UpdateStudentOperation extends Operation
{
    private string $studentId;

    private array $userPayload;

    private array $studentPayload;

    /**
     * Create a new operation instance.
     *
     * @return void
     */
    public function __construct($studentId, $userPayload, $studentPayload)
    {
        $this->studentId = $studentId;
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
            $student = Student::whereId($this->studentId)->first();
            $u = $this->run(UpdateUserJob::class,
                [
                    'userId' => $student->user_id,
                    'payload' => $this->userPayload,
                ]);
            $response = $this->run(UpdateStudentJob::class,
                [
                    'studentId' => $this->studentId,
                    'payload' => $this->studentPayload,
                ]);
            if ($response) {
                DB::commit();

                return [
                    'status' => 'success',
                    'data' => $response,
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
