<?php

namespace App\Services\Instructors\Http\Controllers;

use App\Services\Instructors\Features\IndexInstructorFeature;
use App\Services\Instructors\Features\ShowInstructorFeature;
use Lucid\Units\Controller;

class InstructorController extends Controller
{
    /**
     * Index Instructor
     *
     * @group Instructors
     *
     * @header Authorization string required The authorization token of the user. Example: 'Bearer {token}',
     *
     * @bodyParam per_page string required The per_page of the list. Example, 5,10,50,100,ALL Example: ALL
     * @bodyParam page integer required The page of the list. Example, 1,2,3,4,5 Example: 1
     * @bodyParam search string required The search character. Example, Mg
     */
    public function index()
    {
        return $this->serve(IndexInstructorFeature::class);
    }

    /**
     * Show Instructor
     *
     * @group Instructors
     *
     * @header Authorization string required The authorization token of the user. Example: 'Bearer {token}',
     *
     * @urlParam id required The id of the Instructor.
     */
    public function show($instructor)
    {
        return $this->serve(ShowInstructorFeature::class, ['instructorId' => $instructor]);
    }

    /**
     * Store Instructor
     *
     * @group Instructors
     *
     * @header Authorization string required The authorization token of the user. Example: 'Bearer {token}',
     *
     * @bodyParam name string required The name for creating instructor. Example: Instructor Name
     * @bodyParam email string required The email for creating instructor. Example: instructor@gmail.com
     * @bodyParam password string required The password for creating instructor. Example: password
     * @bodyParam mobile_number string required The mobile number for creating instructor. Example: 09987456123
     * @bodyParam date_of_birth date required The date of birth for creating instructor. Example, yyyy-mm-dd Example: 1990-01-01
     * @bodyParam identity_type enum required The identity type for creating instructor. Example, NRC and PASSPORT Example: NRC
     * @bodyParam identity_number string required The identity number for creating instructor. Example: 786523
     * @bodyParam gender string required The gender for creating instructor. Example, MALE, FEMALE and PREFER NOT TO SAY Example: MALE
     * @bodyParam speciality string required The speciality for creating instructor. Example, Myanmar Example: Science
     * @bodyParam address string required The address field for creating instructor. Example: No 1, test street, Yangon, Myanmar
     * @bodyParam avatar file optional The image for creating instructor.
     */
    public function store()
    {
    }

    /**
     * Store Instructor
     *
     * @group Instructors
     *
     * @header Authorization string required The authorization token of the user. Example: 'Bearer {token}',
     *
     * @urlParam id required The id of the Instructor.
     *
     * @bodyParam name string required The name for creating instructor. Example: Instructor Name
     * @bodyParam email string required The email for creating instructor. Example: instructor@gmail.com
     * @bodyParam password string required The password for creating instructor. Example: password
     * @bodyParam mobile_number string required The mobile number for creating instructor. Example: 09987456123
     * @bodyParam date_of_birth date required The date of birth for creating instructor. Example, yyyy-mm-dd Example: 1990-01-01
     * @bodyParam identity_type enum required The identity type for creating instructor. Example, NRC and PASSPORT Example: NRC
     * @bodyParam identity_number string required The identity number for creating instructor. Example: 786523
     * @bodyParam gender string required The gender for creating instructor. Example, MALE, FEMALE and PREFER NOT TO SAY Example: MALE
     * @bodyParam speciality string required The speciality for creating instructor. Example, Myanmar Example: Science
     * @bodyParam address string required The address field for creating instructor. Example: No 1, test street, Yangon, Myanmar
     * @bodyParam avatar file optional The image for creating instructor.
     */
    public function update($instructor)
    {
    }

    /**
     * Delete Instructor
     *
     * @group Instructors
     *
     * @header Authorization string required The authorization token of the user. Example: 'Bearer {token}',
     *
     * @urlParam id required The id of the Instructor.
     */
    public function destroy($instructor)
    {
    }
}
