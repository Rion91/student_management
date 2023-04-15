<?php

namespace App\Domains\Instructors\Jobs;

use App\Data\Models\Instructor;
use Lucid\Units\Job;

class DeleteInstructorJob extends Job
{
    private string $instructorId;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($instructorId)
    {
        $this->instructorId = $instructorId;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(): void
    {
        Instructor::findOrFail($this->instructorId)->delete();
    }
}
