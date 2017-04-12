<?php

namespace App\Console\Commands;

use App\Http\Requests\AttachRoleRequest;
use App\User;
use App\Role;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Auth;

class AttachRoleCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'role:attach';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Attach a role to a user.';

    /**
     * @var User model
     */
    protected $user;

    /**
     * @var Role model
     */
    protected $role;


    /**
     * Constructor
     *
     * AttachRoleCommand constructor.
     * @param AttachRoleRequest $request
     */
    public function __construct(AttachRoleRequest $request)
    {
        parent::__construct();

        $this->user = User::findOrFail($request->input('user'));
        $this->role = Role::findOrFail($request->input('role_id'));

    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        dispatch(new SendPMCommand($this->user, 'You have been given a new role.'));
        return $this->user->attachRole($this->role);

    }
}
