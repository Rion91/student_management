<?php

namespace App\Domains\Instructors\Jobs;

use App\Data\Models\Instructor;
use App\Helpers\ImageSave;
use Lucid\Units\Job;

class UpdateInstructorJob extends Job
{
    private array $payload;

    private string $instructorId;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($instructorId, $payload)
    {
        $this->instructorId = $instructorId;
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
            ImageSave::avatarSave(Instructor::whereId($this->instructorId)->first()->user, $this->payload['avatar']);
        }

        return Instructor::findOrFail($this->instructorId)->update($this->payload);
    }
}
