<?php

namespace App\Domains\Students\Jobs;

use App\Data\Models\Student;
use Lucid\Units\Job;

class ShowStudentJob extends Job
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
     * @return object
     */
    public function handle(): object
    {
        return Student::findOrFail($this->studentId);
    }
}
