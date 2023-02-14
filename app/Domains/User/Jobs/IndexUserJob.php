<?php

namespace App\Domains\User\Jobs;

use App\Models\User;
use Illuminate\Http\Request;
use Lucid\Units\Job;

class IndexUserJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return object
     */
    public function handle(Request $request): object
    {
        $page = $request->query('page');
        $perPage = $request->query('per_page');

        $search = $request->query('search');
        $searchableFields = ['name', 'email'];

        $order = $request->query('order') ?? [['column' => 'created_at', 'order' => 'desc']];
        $sortableFields = [
            'name',
            'created_at' => 'created_at',
        ];

        $query = User::whereHas('roles', function ($query) {
            $query->where('name', '!=', 'student');
        });

        return $query->purifySortingQuery($order, $sortableFields)->search($searchableFields, $search)->purifyPaginationQuery($perPage, $page);
    }
}
