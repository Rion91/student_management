<?php

namespace App\Domains\Authorization\Jobs;

use Illuminate\Database\Eloquent\Collection;
use LaravelIdea\Helper\Spatie\Permission\Models\_IH_Role_C;
use Lucid\Units\Job;
use Spatie\Permission\Models\Role;

class IndexRoleJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Execute the job.
     *
     * @return Collection|array|_IH_Role_C
     */
    public function handle(): Collection|array|_IH_Role_C
    {
        return Role::all();
    }
}
