<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notifications extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'from_user_id', 'message'
    ];

    /**
     * The table used for this model
     *
     * @var string
     */
    protected $table = 'notifications';

}
