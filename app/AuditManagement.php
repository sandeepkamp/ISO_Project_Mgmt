<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AuditManagement extends Model
{
    protected $table = "audit_managements";

    protected $fillable = [
          'audit_type'

    ];
    
    public function product()
    {
        return $this->belongsTo('App\Product','iso_service_id');
    }

    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

    public function auditinfo()
    {
        return $this->hasMany('App\AuditInfo', 'audit_mgmt_id');
    }

    public function certificationBody()
    {
        return $this->belongsTo('App\CertificationBody', 'certification_body_id');
    }

    
}
