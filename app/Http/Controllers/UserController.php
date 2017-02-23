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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public  function  createUser()
    {
        return view('user.create');
    }


    public function storeUser(UserCreateRequest $request)
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

        return redirect(route('user.store'));
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