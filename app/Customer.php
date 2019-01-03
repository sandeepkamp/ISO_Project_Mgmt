<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public $fillable = [
        'cust_name',
        'cust_phone_number',
        'cust_email',
        'street_name',
        'pincode',
        'city',
        'state',
        'country',
        'contact_person_name',
        'contact_person_number',

    ];

    public function audit_management()
    {
        return $this->hasMany('App\AuditManagement','customer_id');
    }

    public function audit_info()
    {
        return $this->hasMany('App\AuditInfo','customer_id');
    }

    public function certification()
    {
        return $this->hasMany('App\Certification','customer_id');
    }



}
