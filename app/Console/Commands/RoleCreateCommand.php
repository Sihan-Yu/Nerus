<?php

namespace App\Console\Commands;

use App\Http\Requests\RoleCreateRequest;
use App\Role;
use Illuminate\Console\Command;

class RoleCreateCommand extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'role:create';

    /**
     * @var RoleCreateRequest array
     */
    protected $role;

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates a new role';

    /**
     * RoleCreateCommand constructor.
     * @param RoleCreateRequest $role
     */
    public function __construct(RoleCreateRequest $role)
    {
        parent::__construct();
        $this->role = $role;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        //Logic handling the creation of a new role
        $newRole = new Role();
        $newRole->name = $this->role['language-string'];
        $newRole->description = $this->role['description'];

        // Returns new role created if it saved successfully, otherwise returns false
        if ($newRole->save()) {
            return $newRole;
        }

        return false;

    }
}