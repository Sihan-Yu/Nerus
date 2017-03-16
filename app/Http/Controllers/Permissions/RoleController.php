<?php

namespace App\Http\Controllers\Permissions;

use App\Console\Commands\RoleCreateCommand;
use App\Http\Controllers\Controller;
use App\Http\Requests\RoleCreateRequest;
use App\Role;
use App\Permission;
use App\User;
use Illuminate\Http\Request;

class RoleController extends Controller
{

    /**
     * Information of a given role, by id
     *
     * @param $id - GET parameter
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($id)
    {

        $role = Role::findOrFail($id);

        $usersInRole = $role->users(); // TODO this is not really working

        return view('permissions.role', ['role' => $role, 'users' => $usersInRole]);
    }

    /**
     * Creates a new role
     *
     * @param RoleCreateRequest $request
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(RoleCreateRequest $request)
    {

        $bus = dispatch(new RoleCreateCommand($request));

        // Redirect to the new role created, if created successfully
        if ($bus) {
            return redirect(route('role.index', $bus->id));
        }

        // There was an error, ask the user to try again
        return redirect()->back()->withErrors([]);

    }

}
