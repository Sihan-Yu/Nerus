<?php namespace App;

use Zizaco\Entrust\EntrustRole;
use OwenIt\Auditing\Auditable;

class Role extends EntrustRole
{
    use Auditable;

}