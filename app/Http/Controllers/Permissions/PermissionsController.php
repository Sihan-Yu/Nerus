<?php

namespace App\Http\Controllers\Permissions;

use App\Console\Commands\PermissionCreateCommand;
use App\Console\Commands\RoleCreateCommand;
use App\Http\Controllers\Controller;
use App\Http\Requests\PermissionCreateRequest;
use App\Http\Requests\RoleCreateRequest;
use App\Role;
use App\Permission;
use App\Http\Controllers\Auth as Auth;
use Illuminate\Http\Request;

class PermissionsController extends Controller
{

    /**
     * Returns the view with permissions and roles
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $permissions = Permission::all();
        $roles = Role::all();
        return view('permissions.index', ['roles' => $roles, 'permissions' => $permissions]);
    }

    /**
     * Dispatches job to  create a new role
     *
     * @param PermissionCreateRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(PermissionCreateRequest $request)
    {
        $bus = dispatch(new PermissionCreateCommand($request));

        // Redirect to the new role created, if created successfully
        if ($bus) {
            return redirect(route('permissions.index'));
        }

    }

}
