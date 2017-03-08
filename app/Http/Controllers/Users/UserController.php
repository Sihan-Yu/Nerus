<?php

/**
 * Users namespace - all user related classes/methods go here
 */
namespace App\Http\Controllers\Users;

use App\Console\Commands\UserRegistration;
use App\Console\Commands\UserRegistrationCommand;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserCreateRequest;
use App\User;

/**
 * Class UserController
 * @package App\Http\Controllers\Users
 */
class UserController extends Controller
{

    /**
     * Main page with the list of the users
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $users = User::all();
        return view('users.index', ['users' => $users]);
    }

    /**
     * Shows the profile of a specific user
     *
     * @param $userId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($userId)
    {
        $user = User::find($userId);
        return view('users.profile', ['user' => $user]);
    }

    /**
     * Returns the view for the user creation
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $users = User::all();
        return view('users.create', ['users' => $users]);
    }

    /**
     * Creates a new user on the database
     *
     * @param UserCreateRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(UserCreateRequest $request)
    {

        $result = dispatch(new UserRegistrationCommand($request));

        dd($result);

    }

}
