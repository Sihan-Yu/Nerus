<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use League\Flysystem\Exception;

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

    public function show($userId)
    {
        $user = User::find($userId);
        return view('users.profile', ['user' => $user]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public  function  create()
    {
        $users = User::all();
        return view('users.create', ['users' => $users]);
    }


    public function store(UserCreateRequest $request)
    {
        $credentials = $request->only('email','name');
        $generatedpass = $this->generatePassword(); // un hashed generated password to send via email
        $hashedpass= Hash::make($generatedpass); // hashed generated password to use internally

        $credentials = array_merge($credentials, ['password' => $hashedpass]);

        $isUser = User::where('email', '=', $credentials['email'])->count();

        if (!$isUser)
        {
            User::create($credentials);
        }

        return redirect(route('users.store'));
    }

    protected function generatePassword($length = 8) {
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $count = mb_strlen($chars);

        for ($i = 0, $result = ''; $i < $length; $i++) {
            $index = rand(0, $count - 1);
            $result .= mb_substr($chars, $index, 1);
        }

        return $result;
    }

}