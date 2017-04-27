<?php

namespace App\Console\Commands;

use App\Http\Requests\DetachRoleRequest;
use Illuminate\Console\Command;
use App\Role;
use App\User;

class DetachRoleCommand extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'role:detach';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Detach a role from a user';

    /**
     * @model User Model
     */
    protected $user;

    /**
     * @model Role Model
     */
    protected $role;

    /**
     * Constructor
     *
     * DetachRoleCommand constructor.
     * @param DetachRoleRequest $request
     */
    public function __construct(DetachRoleRequest $request)
    {

        parent::__construct();

        $this->role = Role::findOrFail($request->input('role_id'));
        $this->user = User::findOrFail($request->input('user_id'));

    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        return $this->user->detachRole($this->role);

    }

}
