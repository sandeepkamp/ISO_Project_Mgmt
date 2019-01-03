<?php

namespace App\Http\Controllers;

use App\Certification;
use Illuminate\Http\Request;
use DB;

class CertificationInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $certifications = Certification::all();
        return view('certifications.index', compact('certifications'));
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
        $certificationBody = DB::table('certification_bodies')->select('id','certification_body_name')->get();
        return view('certifications.create', compact('customers','products', 'certificationBody'));
    }
}
