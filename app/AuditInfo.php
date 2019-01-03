<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AuditInfo extends Model
{
    protected $table = "audit_infos";

    protected $fillable = [
        'audit_mgmt_id',
        'last_audit_date',
        'last_audit_type',
        'next_audit_date',
        'next_audit_type'

    ];

    public function auditmanagement()
    {
        return $this->belongsTo('App\AuditManagement' ,'audit_mgmt_id');
    }

    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }
}
