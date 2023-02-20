<?php

namespace App\Domains\Students\Jobs;

use App\Data\Models\Student;
use Illuminate\Http\Request;
use Lucid\Units\Job;

class IndexStudentJob extends Job
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
        $page = $request->query('page');
        $perPage = $request->query('per_page');

        $search = $request->query('search');
        $searchableFields = ['gender', 'mobile_number', 'contact_person', 'contact_number', 'address'];

        $order = $request->query('order') ?? [['column' => 'created_at', 'order' => 'desc']];
        $sortableFields = [
            'created_at' => 'created_at',
            'date_of_birth' => 'date_of_birth',
        ];

        $query = Student::with('user');

        return $query->purifySortingQuery($order, $sortableFields)->search($searchableFields, $search)->purifyPaginationQuery($perPage, $page);
    }
}
