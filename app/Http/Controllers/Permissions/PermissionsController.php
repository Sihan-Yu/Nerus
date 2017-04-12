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
        $roles = Role::orderBy('name')->get();
        return view('permissions.index', ['roles' => $roles, 'permissions' => $permissions]);
    }

    /**
     * Dispatches job to  create a new roles
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

    /**
     * Remove a permission
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function remove(Request $request)
    {

        $permission = Permission::findOrFail($request->input('permission_id'));
        $permission->delete();

        return redirect()->back();

    }

    /**
     * Attaches a permission to a role
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function attach(Request $request)
    {

        $role = Role::findOrFail($request->input('role_id'));
        $permission = Permission::findOrFail($request->input('permission'));

        $role->attachPermission($permission);

        return redirect()->back();

    }

    /**
     * Detaches a permission from a role
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function detach(Request $request)
    {

        $role = Role::findOrFail($request->input('role_id'));
        $permission = Permission::findOrFail($request->input('permission_id'));

        $role->detachPermission($permission);

        return redirect()->back();

    }

}
