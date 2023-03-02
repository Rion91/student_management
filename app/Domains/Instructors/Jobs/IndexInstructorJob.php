<?php

namespace App\Domains\Instructors\Jobs;

use App\Data\Models\Instructor;
use Illuminate\Http\Request;
use Lucid\Units\Job;

class IndexInstructorJob extends Job
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
     * @param  Request  $request
     * @return object
     */
    public function handle(Request $request): object
    {
        $page = $request->get('page');
        $perPage = $request->get('per_page');

        $search = $request->get('search');
        $searchableFields = ['gender', 'mobile_number', 'speciality', 'address'];

        $order = $request->query('order') ?? [['column' => 'created_at', 'order' => 'desc']];
        $sortableFields = [
            'created_at' => 'created_at',
            'date_of_birth' => 'date_of_birth',
        ];

        $query = Instructor::with('user');

        return $query->purifySortingQuery($order, $sortableFields)->search($searchableFields, $search)->purifyPaginationQuery($perPage, $page);
    }
}
