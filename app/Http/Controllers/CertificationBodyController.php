<?php

namespace App\Http\Controllers;

use App\CertificationBody;

use Illuminate\Http\Request;
use DB;
use App\Product;

class CertificationBodyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $certificationbodys = CertificationBody::latest()->paginate(5);
        $certificationbodys = CertificationBody::all();
        return view('certificationbody.index', compact('certificationbodys'));
  
        // return view('certificationbody.index',compact('certificationbodys'))
        //     ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = DB::table('products')->select('id','name')->get();
        return view('certificationbody.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // dd($request);
        $request->validate([
           // 'iso_service_id'  => 'required',
            'accreditation' => 'required',
            'certification_body_name'  => 'required',
        ]);
        
        $certification = new CertificationBody;

        
        $certification->accreditation = $request->accreditation;
        $certification->iso_service_id = $request->iso_service_name;
        $certification->certification_body_name = $request->certification_body_name;

        $certification->save();
        

        return redirect()->route('certifications.index')
        ->with('success','Created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(certificationbody $certificationbody)
    {
        return view('certificationbody.show',compact('certificationbody'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\
     * @return \Illuminate\Http\Response
     */
    public function edit(certificationbody $certificationbody,$id)
    {
       //dd($certificationbody);
        $certificationbody = CertificationBody::findOrFail($id);
        $products = Product::all();
        $iso = Product::findOrFail($certificationbody->iso_service_id);
        return view('certificationbody.edit',compact('certificationbody', 'products', 'iso'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request);
        $certificationbody = CertificationBody::findOrFail($id);

        $request->validate([
            'iso_service_id' =>'required',
            'accreditation' => 'required',
            'certification_body_name'  => 'required',
        ]);
      
  
        $certificationbody->update($request->all());
  
        return redirect()->route('certifications.index')
                        ->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(certificationbody $certificationbody)
    {
        $certificationbody->delete();
  
        return redirect()->route('certificationbody.index')
                        ->with('success','Product deleted successfully');
    }
}
