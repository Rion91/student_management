<?php

namespace App\Domains\Students\Jobs;

use App\Data\Models\Student;
use Lucid\Units\Job;

class DeleteStudentJob extends Job
{
    private string $studentId;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($studentId)
    {
        $this->studentId = $studentId;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(): void
    {
        Student::findOrFail($this->studentId)->delete();
    }
}
