<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $fillable = [
        'name', 
        'detail',
    ];

    public function audit_management()
    {
        return $this->hasMany('App\AuditManagement','iso_service_id');
    }

    public function certification()
    {
        return $this->hasMany('App\Product','iso_service_id');
    }
}
