<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use OwenIt\Auditing\Auditable;

class User extends Authenticatable
{

    use Notifiable;
    use Auditable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'isactive'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Relationship with the user details table
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function details()
    {
        return $this->belongsTo(UserDetails::class, 'user_id');
    }

    /**
     * Generates a random password for temporary passwords
     *
     * @param int $bytes
     * @return string
     */
    public static function generateRandomPassword($bytes = 4)
    {
        return bin2hex(openssl_random_pseudo_bytes($bytes));
    }

}
