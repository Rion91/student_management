<?php

namespace App\Services\Users\Http\Controllers;

use App\Services\Users\Features\DeleteUserFeature;
use App\Services\Users\Features\IndexUserFeature;
use App\Services\Users\Features\ShowUserFeature;
use App\Services\Users\Features\StoreUserFeature;
use App\Services\Users\Features\UpdateUserFeature;
use Lucid\Units\Controller;

class UserController extends Controller
{
    /**
     * Index User
     *
     * @group Users
     *
     * @header Authorization string required The authorization token of the user. Example: 'Bearer {token}',
     *
     * @bodyParam per_page string required The per_page of the list. Example, 5,10,50,100,ALL Example: ALL
     * @bodyParam page integer required The page of the list. Example, 1,2,3,4,5 Example: 1
     * @bodyParam search string The search character. Example, Mg
     */
    public function index()
    {
        return $this->serve(IndexUserFeature::class);
    }

    /**
     * Show User
     *
     * @group Users
     *
     * @header Authorization string required The authorization token of the user. Example: 'Bearer {token}',
     *
     * @urlParam id required The id of the User.
     */
    public function show($user)
    {
        return $this->serve(ShowUserFeature::class, ['userId' => $user]);
    }

    /**
     * Store User
     *
     * @group Users
     *
     * @unauthenticated
     *
     * @bodyParam name string required The name for register student. Example: admin
     * @bodyParam email string required The email for register student. Example: admin@gmail.com
     * @bodyParam password string required The password for register student. Example: password
     * @bodyParam role string required The password for register student. Example: super-admin
     * @bodyParam avatar file optional The image for register student.
     */
    public function store()
    {
        return $this->serve(StoreUserFeature::class);
    }

    /**
     * Update User
     *
     * @group Users
     *
     * @unauthenticated
     *
     * @bodyParam name string required The name for register student. Example: admin
     * @bodyParam email string required The email for register student. Example: admin@gmail.com
     * @bodyParam password string required The password for register student. Example: password
     * @bodyParam avatar file optional The image for register student.
     */
    public function update($user)
    {
        return $this->serve(UpdateUserFeature::class, ['userId' => $user]);
    }

    /**
     * Delete User
     *
     * @group Users
     *
     * @header Authorization string required The authorization token of the user. Example: 'Bearer {token}',
     *
     * @urlParam id required The id of the User.
     */
    public function destroy($user)
    {
        return $this->serve(DeleteUserFeature::class, ['userId' => $user]);
    }
}
