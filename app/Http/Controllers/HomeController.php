<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('web.home');
    }

    public function dashboard()
    {
        return view('home');
    }

    public function contacts()
    {
        return view('web.contacts');
    }

}
