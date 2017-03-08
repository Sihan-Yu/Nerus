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
    protected $signature = 'command:name';
    /**
     * @var RoleCreateRequest array
     */
    protected $role;

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
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
            $newRole->name = $role['name'];
            $newRole->display_name = $role['lang_string'];//optional
            $newRole->description = $role['description'];//optional
            $newRole->save();
    }
}