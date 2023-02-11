<?php

namespace App\Domains\Students\Jobs;

use App\Data\Models\Student;
use App\Helpers\ImageSave;
use Lucid\Units\Job;

class UpdateStudentJob extends Job
{
    private array $payload;

    private string $studentId;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($studentId, $payload)
    {
        $this->studentId = $studentId;
        $this->payload = $payload;
    }

    /**
     * Execute the job.
     *
     * @return bool
     */
    public function handle(): bool
    {
        if ($this->payload['avatar']) {
            ImageSave::avatarSave(Student::whereId($this->studentId)->first()->user, $this->payload['avatar']);
        }

        return Student::findOrFail($this->studentId)->update($this->payload);
    }
}
