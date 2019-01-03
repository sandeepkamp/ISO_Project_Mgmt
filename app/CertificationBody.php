<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CertificationBody extends Model
{

    protected $table = "certification_bodies";
    
    protected $fillable = [
        'iso_service_id','accreditation', 'certification_body_name'
    ];

    public function certification()
    {
        return $this->hasMany('App\Certification','certification_body_id');
    }

    public function product()
    {
        return $this->belongsTo('App\Product','iso_service_id');
    }

}
