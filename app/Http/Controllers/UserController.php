<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User as Users;

class UserController extends Controller
{

    /**
     * Main page with the list of the users
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getList()
    {
        $users = Users::all();
        return view('users.index', ['users' => $users]);
    }

    public function showProfile($userId)
    {
        $user = Users::find($userId);
        return view('users.profile', ['user' => $user]);
    }

}
