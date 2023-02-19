<?php

namespace App\Domains\Instructors\Jobs;

use App\Data\Models\Instructor;
use App\Helpers\ImageSave;
use Lucid\Units\Job;

class StoreInstructorJob extends Job
{
    private array $payload;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($payload)
    {
        $this->payload = $payload;
    }

    /**
     * Execute the job.
     *
     * @return object
     */
    public function handle(): object
    {
        $instructor = Instructor::create($this->payload);
        if (! empty($this->payload['avatar'])) {
            ImageSave::avatarSave($instructor->user, $this->payload['avatar']);
        }

        return $instructor;
    }
}
