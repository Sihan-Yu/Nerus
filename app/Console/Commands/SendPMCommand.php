<?php

namespace App\Console\Commands;

use App\Notifications;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Auth;

class SendPMCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pm:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send internal PM';

    /**
     * @App\Model User model
     */
    protected $user;

    /**
     * @string Message to be sent
     */
    protected $message;

    /**
     * SendPMCommand constructor.
     * @param User $user
     * @param $message
     */
    public function __construct(User $user, $message)
    {
        parent::__construct();

        $this->user = $user;
        $this->message = $message;

    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        $notification = new Notifications();
        $notification->from_user_id = Auth::user()->getAuthIdentifier();
        $notification->to_user_id = $this->user->getAuthIdentifier();
        $notification->message = $this->message;
        return $notification->save();

    }

}
