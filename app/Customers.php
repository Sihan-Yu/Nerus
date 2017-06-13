<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;

class Customers extends Model
{

    use Auditable;

    protected $table = 'customers';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name_en', 'name_cn', 'assigned_to_id', 'has_vat', 'vat_number', 'business_address', 'postal_address', 'postal_code', 'phone', 'country_id', 'fax', 'email', 'bank_id', 'bank_number', 'is_active', 'website'
    ];

}
