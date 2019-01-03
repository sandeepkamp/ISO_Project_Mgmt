<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Customer;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('customer.index')->withCustomers(Customer::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customer.create');
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
        $rules = [
            'cust_name' => 'required',
            'cust_phone_number' => 'required',
            'cust_email' => 'required',
            'contact_person_name' => 'required',
            'contact_person_number' => 'required',
            'city' => 'required',
            'state' => 'required',
            'street_name' => 'required',
            'pincode' => 'required',
        ];

        $this->validate($request, $rules);

        $data = $request->all();
        $customer = Customer::create($data);

        return redirect()->route('customer.show', ['id'=> $customer->id]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);

        $this->validate($request, [
            'cust_name' => 'required',
            'cust_phone_number' => 'required',
            'cust_email' => 'required',
            'contact_person_name' => 'required',
            'contact_person_number' => 'required',
            'city' => 'required',
            'state' => 'required',
            'street_name' => 'required',
            'pincode' => 'required',
        ]);

        $customer->update($request->all());

        return redirect()->route('customer.show', ['id' => $customer->id]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        return view('customer.edit')->with('customer', $customer);
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = Customer::findOrFail($id);
        // dd($cust_id);
        return view('customer.show')->with('customer', $customer);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();

        return redirect()->route('customer.index')
            ->with('success','Customer deleted successfully');

    }

}
