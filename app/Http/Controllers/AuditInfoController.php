<?php

namespace App\Http\Controllers;

use App\AuditInfo;
use Illuminate\Http\Request;
use DB;

class AuditInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $auditinfos = AuditInfo::with('auditmanagement.product')->get();
       // return response()->json($auditinfos);
        //dd($auditinfos);

        return view('auditinfo.index', compact('auditinfos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers =DB::table('customers')->select('id','cust_name')->get();
        return view('auditinfo.create', compact('customers'));
    }


    public function update(Request $request, $id)
    {
        $audit = AuditInfo::findOrFail($id);

        $this->validate($request, [

         'certification_body',
            'accreditation',
            'last_audit_date',
            'last_audit_type',
            'next_audit_date',
            'next_audit_type',
        ]);

        $audit->update($request->all());

        if($audit->last_audit_type == 'first_surveillance')
        {
            $audit->next_audit_type = 'second_surveillance';
            $date = date('Y-m-d', strtotime($_POST['last_audit_date']. '+ 364 day'));
           // dd($date);
           $audit->next_audit_date = $date ; 
            $audit->save();
        }



        if($audit->last_audit_type == 'second_surveillance')
        {
            $audit->next_audit_type = 'recertification';
            // $dt2 = $audit['last_audit_date'];
            // $end2 = date('Y-m-d', strtotime('+1 years'));
            // // $renewalDate  = $dt->format('d F Y'); 
            // $audit->next_audit_date = $end2 ;
            $audit->save();
        }

        return redirect()->route('auditinfo.index', ['id' => $audit->id]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $audit = AuditInfo::findOrFail($id);
        $auditinfos=AuditInfo::with('auditmanagement.product')->get();
       // dd($auditinfos);
        return view('auditinfo.edit')->with('audit', $audit,'auditinfos',$auditinfos);
    }
}
