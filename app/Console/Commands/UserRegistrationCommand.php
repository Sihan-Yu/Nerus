<?php

namespace App\Console\Commands;

use App\Http\Requests\UserCreateRequest;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserRegistrationCommand extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'employee:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates a new user as employee';

    /**
     * New user
     *
     * @var array
     */
    protected $user;

    /**
     * UserRegistrationCommand constructor.
     * @param UserCreateRequest $user
     */
    public function __construct(UserCreateRequest $user)
    {

        parent::__construct();

        $this->user = $user;

    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        // Generates a random temporary password and hashes it using Laravel's encryption algorithm
        $hashedPassword = Hash::make(User::generateRandomPassword());

        // Merges email, name and password into an unique password
        $userCredentials = ['email' => $this->user['email'], 'name' => $this->user['name'], 'password' => $hashedPassword];

        // Checks if the email used already exists on the database
        $isUser = User::where('email', '=', $userCredentials['email'])->count();

        return (!$isUser ? User::create($userCredentials) : false);

    }
}
