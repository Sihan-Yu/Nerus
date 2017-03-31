<?php namespace App;

use Laratrust\LaratrustRole;
use OwenIt\Auditing\Auditable;

class Role extends LaratrustRole
{
    use Auditable;
}