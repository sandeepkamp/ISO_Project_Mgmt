<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Certification extends Model
{
    protected $table = "certifications";

    protected $fillable = [
        'price',
    ];

    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

    public function product()
    {
        return $this->belongsTo('App\Product', 'iso_service_id');
    }

    public function certificationbody()
    {
        return $this->belongsTo('App\CertificationBody', 'certification_body_id');
    }
}
