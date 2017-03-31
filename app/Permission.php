<?php namespace App;

use Laratrust\LaratrustPermission;
use OwenIt\Auditing\Auditable;

class Permission extends LaratrustPermission
{
    use Auditable;
}