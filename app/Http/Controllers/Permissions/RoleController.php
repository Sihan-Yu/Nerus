<?php

namespace App\Http\Controllers\Permissions;

use App\Console\Commands\AttachRoleCommand;
use App\Console\Commands\RoleCreateCommand;
use App\Console\Commands\DetachRoleCommand;
use App\Http\Controllers\Controller;
use App\Http\Requests\AttachRoleRequest;
use App\Http\Requests\DetachRoleRequest;
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

        // Gets the permissions and users assigned to that role
        $role = Role::findOrFail($id);
        $usersInRole = $role->users;
        $permissionsInRole = $role->permissions;

        // Creates a new array to exclude users already in the role to be excluded from the selectbox
        $users = [];
        foreach ($usersInRole as $user) {
            $users[$user->id]['id'] = $user->id;
            $users[$user->id]['name'] = $user->name;
        }

        // To populate the drop down to be able to add new users
        $allUsers = User::orderBy('name')->get();

        // Go through all the users in the role and filter out the ones that are in the role.
        // This is to avoid adding someone already in the role.
        $filteredAllUsers = [];
        foreach ($allUsers as $user) {
            if (!array_key_exists($user->id, $users)) {
                $filteredAllUsers[$user->id]['id'] = $user->id;
                $filteredAllUsers[$user->id]['name'] = $user->name;
            }
        }

        $permissions = [];
        foreach ($permissionsInRole as $permission) {
            $permissions[$permission->id]['id'] = $permission->id;
            $permissions[$permission->id]['name'] = $permission->name;
        }

        $allPermissions = Permission::orderBy('name')->get();

        $filteredPermissions = [];
        foreach ($allPermissions as $permission) {
            if (!array_key_exists($permission->id, $permissions)) {
                $filteredPermissions[$permission->id]['id'] = $permission->id;
                $filteredPermissions[$permission->id]['name'] = $permission->name;
            }
        }

        $allUsers = $filteredAllUsers;
        $allPermissions = $filteredPermissions;

        return view('permissions.role', ['role' => $role, 'users' => $usersInRole, 'allusers' => $allUsers, 'permissions' => $permissionsInRole, 'allpermissions' => $allPermissions]);

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

    /**
     * Attach a role to a user
     *
     * @param AttachRoleRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function attach(AttachRoleRequest $request)
    {

        $bus = dispatch(new AttachRoleCommand($request));

        return redirect()->back();

    }

    /**
     * Detach a role from a user
     *
     * @param DetachRoleRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function detach(DetachRoleRequest $request)
    {

        $bus = dispatch(new DetachRoleCommand($request));

        return redirect()->back();

    }

}
