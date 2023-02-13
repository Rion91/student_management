<?php

namespace App\Services\Students\Http\Controllers;

use App\Services\Students\Features\DeleteStudentFeature;
use App\Services\Students\Features\IndexStudentFeature;
use App\Services\Students\Features\ShowStudentFeature;
use App\Services\Students\Features\StoreStudentFeature;
use App\Services\Students\Features\UpdateStudentFeature;
use Lucid\Units\Controller;

class StudentController extends Controller
{
    /**
     * Index Student
     *
     * @group Students
     *
     * @header Authorization string required The authorization token of the user. Example: 'Bearer {token}',
     *
     * @bodyParam per_page string required The per_page of the list. Example, 5,10,50,100,ALL Example: ALL
     * @bodyParam page integer required The page of the list. Example, 1,2,3,4,5 Example: 1
     * @bodyParam search string required The search character. Example, Mg
     */
    public function index()
    {
        return $this->serve(IndexStudentFeature::class);
    }

    /**
     * Show Student
     *
     * @group Students
     *
     * @header Authorization string required The authorization token of the user. Example: 'Bearer {token}',
     *
     * @urlParam id required The id of the Student.
     */
    public function show($student)
    {
        return $this->serve(ShowStudentFeature::class, ['studentId' => $student]);
    }

    /**
     * Store Student
     *
     * @group Students
     *
     * @unauthenticated
     *
     * @bodyParam name string required The name for register student. Example: Mg Min
     * @bodyParam email string required The email for register student. Example: example@gmail.com
     * @bodyParam password string required The password for register student. Example: password
     * @bodyParam mobile_number string required The mobile number for register student. Example: 09987654321
     * @bodyParam date_of_birth date required The date of birth for register student. Example, yyyy-mm-dd Example: 2000-11-9
     * @bodyParam identity_type enum required The identity type for register student. Example, NRC and PASSPORT Example: NRC
     * @bodyParam identity_number string required The identity number for register student. Example: 321654
     * @bodyParam gender string required The gender for register student. Example, MALE, FEMALE and PREFER NOT TO SAY Example: MALE
     * @bodyParam nationality string required The nationality for register student. Example, Myanmar Example: Myanmar
     * @bodyParam academic_field string required The academic field for register student. Example: HEALTH Science
     * @bodyParam contact_person string optional The contact person field for register student. Example: mom
     * @bodyParam contact_number string optional The contact number field for register student. Example: 09123456789
     * @bodyParam address string required The address field for register student. Example: No 1, test street, Yangon, Myanmar
     * @bodyParam avatar file optional The image for register student.
     */
    public function store()
    {
        return $this->serve(StoreStudentFeature::class);
    }

    /**
     * Update Student
     *
     * @group Students
     *
     * @header Authorization string required The authorization token of the user. Example: 'Bearer {token}',
     *
     * @urlParam id required The id of the Student.
     *
     * @bodyParam name string required The name for register student. Example: Mg Min
     * @bodyParam email string required The email for register student. Example: example@gmail.com
     * @bodyParam password string required The password for register student. Example: password
     * @bodyParam mobile_number string required The mobile number for register student. Example: 09987654321
     * @bodyParam date_of_birth date required The date of birth for register student. Example, yyyy-mm-dd Example: 2000-11-9
     * @bodyParam identity_type enum required The identity type for register student. Example, NRC and PASSPORT Example: NRC
     * @bodyParam identity_number string required The identity number for register student. Example: 321654
     * @bodyParam gender string required The gender for register student. Example, MALE, FEMALE and PREFER NOT TO SAY Example: MALE
     * @bodyParam nationality string required The nationality for register student. Example, Myanmar Example: Myanmar
     * @bodyParam academic_field string required The academic field for register student. Example: HEALTH Science
     * @bodyParam contact_person string optional The contact person field for register student. Example: mom
     * @bodyParam contact_number string optional The contact number field for register student. Example: 09123456789
     * @bodyParam address string required The address field for register student. Example: No 1, test street, Yangon, Myanmar
     * @bodyParam avatar file optional The image for register student.
     */
    public function update($student)
    {
        return $this->serve(UpdateStudentFeature::class, ['studentId' => $student]);
    }

    /**
     * Delete Student
     *
     * @group Students
     *
     * @header Authorization string required The authorization token of the user. Example: 'Bearer {token}',
     *
     * @urlParam id required The id of the Student.
     */
    public function destroy($student)
    {
        return $this->serve(DeleteStudentFeature::class, ['studentId' => $student]);
    }
}
