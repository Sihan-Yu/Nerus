<?php

namespace App\Http\Controllers;

use App\Console\Commands\RoleCreateCommand;
use App\Http\Requests\RoleCreateRequest;
use App\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    //
    function store(RoleCreateRequest $request)
    {
        dispatch(new RoleCreateCommand($request));
    }
}
