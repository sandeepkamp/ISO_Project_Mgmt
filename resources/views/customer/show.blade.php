@extends('layouts.app')
  
@section('content')

<div>
  <h1>{{$customer->name}}</h1>      
</div>
<br>

<div class="pull-right">
    <a class="btn btn-primary" href="{{ route('customer.index') }}"> Back</a>
</div>
<div class="row">
    <div class="col-sm-8">
            <h1>Customer details</h1><br>
            <table class="table table-border" >
                    <tr class="table-primary" >
                        <th scope="row">Name</th>
                        <td>{{$customer->cust_name}}</td>
                    </tr>
                    <tr class="table-primary">
                        <th scope="row">Address</th>
                        <td>
                            @if($customer->street_name)
                            {{$customer->street_name}},
                            @endif
                            @if($customer->city)
                            {{$customer->city}},
                            @endif
                            @if($customer->state)
                            {{$customer->state}},
                            @endif
                            @if($customer->pincode)
                            {{$customer->pincode}},
                            @endif
                            @if($customer->country)
                            {{$customer->country}}
                            @endif
                        </td>
                    </tr>
                    <tr class="table-primary">
                        <th scope="row">Phone number</th>
                        <td>{{$customer->cust_phone_number}}</td>
                    </tr>
                    <tr>
                        <th>Contact Person</th>
                        <td>{{$customer->contact_person_name}}</td>
                    </tr>
                    <tr>
                        <th>Contact Person Number</th>
                        <td>{{$customer->contact_person_number}}</td>
                    </tr>
                    <tr class="table-primary">
                        <th scope="row">Email</th>
                        <td>{{$customer->cust_email}}</td>
                    </tr>
            </table>
    </div>
   
</div>
@endsection