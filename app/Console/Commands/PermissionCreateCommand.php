<?php

namespace App\Console\Commands;

use App\Http\Requests\PermissionCreateRequest;
use App\Permission;
use Illuminate\Console\Command;

class PermissionCreateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'permission:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates a new permission';

    /**
     * Request array
     *
     * @var array
     */
    protected $permission;

    /**
     * PermissionCreateCommand constructor.
     * @param PermissionCreateRequest $permission
     */
    public function __construct(PermissionCreateRequest $permission)
    {
        parent::__construct();
        $this->permission = $permission;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //Logic handling the creation of a new role
        $newPermission = new Permission();
        $newPermission->name = $this->permission['name'];
        $newPermission->description = $this->permission['description'];

        // Returns new role created if it saved successfully, otherwise returns false
        if ($newPermission->save()) {
            return $newPermission;
        }

        return false;
    }
}
