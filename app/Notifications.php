<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Notifications extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'from_user_id', 'to_user_id', 'message'
    ];

    /**
     * The table used for this model
     *
     * @var string
     */
    protected $table = 'notifications';

    /**
     * Gets all messages for the current logged in user
     *
     * @param $user - User Model
     * @return mixed
     */
    public static function getLoggedInUserNotifications() {

        if (!Auth::user()) {
            return [];
        }

        $notifications = self::where('to_user_id', '=', Auth::user()->getAuthIdentifier())->get();

        $notificationsArray = [];
        foreach ($notifications as $notification) {
            $notificationsArray[$notification->id]['user'] = User::findOrFail($notification->from_user_id);
            $notificationsArray[$notification->id]['date'] = $notification->created_at;
            $notificationsArray[$notification->id]['message'] = $notification->message;
        }

        return $notificationsArray;

    }

}
