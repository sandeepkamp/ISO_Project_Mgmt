<?php

namespace App\Http\Controllers;

use App\AuditInfo;
use App\Certification;
use App\CertificationBody;
use Illuminate\Http\Request;
use App\AuditManagement;
use DB;
use App\Customer;
use App\Product;

class AuditManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $auditmanagements = AuditManagement::all();
        return view('auditmgmt.index', compact('auditmanagements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers =DB::table('customers')->select('id','cust_name')->get();
        $products =DB::table('products')->select('id','name')->get();
        $certifications = DB::table('certification_bodies')->select('id','certification_body_name','accreditation')->get();
        return view('auditmgmt.create', compact('customers','products','certifications'));
    }

    public function store(Request $request)
    {
        //dd($request);
        $request->validate([
            'audit_type' => 'required',
        ]);

        $audit = new AuditManagement;
        $certification = new Certification;
        $auditInfo = new AuditInfo;

        $audit->customer_id = $request->customer_name;
        $audit->iso_service_id = $request->iso_service_name;
        $audit->auditor_name = $request->auditor_name;
        $audit->audit_date = $request->audit_date;
        $audit->audit_type = $request->audit_type;
        $audit->audit_status = $request->status;
        $audit->certification_date = $request->certification_date;
        $audit->certification_body_id = $request->certification_name;
        $audit->certification_price = $request->price;
        $audit->certification_status = $request->certification_status;

        $audit->save();

        return redirect()->route('auditmanagement.index')
            ->with('success','Created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(auditmanagement  $auditmgmt ,$id)
    {
       $auditmgmt = AuditManagement::findOrFail($id);
      //dd($auditmgmt);
       $products = Product::all();
      $iso = Product::findOrFail($auditmgmt ->iso_service_id);
      // dd($iso);
       $customers = Customer::all();
       $cust = Customer::findOrFail($auditmgmt ->customer_id);
       $certificates = CertificationBody::all();
       $certificationbody= CertificationBody::findOrFail($auditmgmt ->certification_body_id);

        return view('auditmgmt.edit', compact('auditmgmt','certificates','certificationbody', 'products', 'customers','iso','cust'));
    }


    public function update(Request $request, $id)
    {
        //dd($request);
        $auditmgmt = AuditManagement::find($id);
        $auditinfo = new AuditInfo;
       
        $request->validate([
            'customer_id',
            'certification_body_id',
            'iso_service_id',
            'auditor_name' => 'required',
            'audit_date' => 'required',
            'audit_type' => 'required',
            'audit_status' => 'required',
            'certification_date' => 'nullable',
            'certification_status' => 'required',
            'certification_price' =>'nullable',
        ]);

        $auditmgmt->audit_status = $request->get('audit_status');
        $auditmgmt->certification_date = $request->get('certification_date');
        $auditmgmt->certification_status = $request->get('certification_status');
        $auditmgmt->certification_price = $request->get('certification_price');

        $auditmgmt->save();
        if($auditmgmt->certification_status == 'certification_done')
        {
           // dd($auditmgmt);
            $auditinfo->customer_id = $auditmgmt->customer_id;
            $auditinfo->audit_mgmt_id = $auditmgmt->id;
            $auditinfo->last_audit_date = $auditmgmt->certification_date;
            $auditinfo->last_audit_type = $auditmgmt->audit_type;
            $auditinfo->next_audit_type = 'first_surveillance';
           
            $date = date('Y-m-d', strtotime($_POST['certification_date']. '+ 364 day'));
           // dd($date);
           $auditinfo->next_audit_date = $date ; 
           
        }
        $auditinfo->save();

        return redirect()->route('auditmanagement.index');
    }

}
