@extends('layouts.app')
  
@section('content')

<div class="pull-right">
    <a class="btn btn-primary" href="{{ route('customer.index') }}"> Back</a>
</div>

<div class="row">
    <div class="col-md-6">
                <h1>Edit Customer Details</h1>
                    <form action="{{route('customer.update', ['id' => $customer->id])}}" method="post">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        {{csrf_field()}}
                        @method('PUT')
                        <div class="form-group">
                 <label for="cust_name">NAME</label>
                 <input type="cust_name" class="form-control" id="cust_name" placeholder="Enter Name" name="cust_name" value="{{$customer->cust_name}}">
              </div>
              <div class="form-group">
                 <label for="exampleInputEmail">Email address</label>
                 <input type="cust_email" class="form-control" id="cust_email" placeholder="Enter email" name="cust_email" value="{{$customer->cust_email}}">
              </div>
              <div class="form-group">
                  <label for="phoneno">Phone Number</label>
                  <input type="cust_phone_number" class="form-control" id="cust_phone_number" placeholder="Enter Number"  name="cust_phone_number" value="{{$customer->cust_phone_number}}" >
              </div>
              <div class="form-group">
                 <label for="contact_person">Contact Person</label>
                 <input type="text" class="form-control" id="contact_person_name" name="contact_person_name" value="{{$customer->contact_person_name}}">
             </div>
             <div class="form-group">
                 <label for="contact_person_number">Contact Person Number</label>
                 <input type="text" class="form-control" id="contact_person_number" name="contact_person_number" value="{{$customer->contact_person_number}}">
             </div>
              <div class="form-group">
                     <label for="street_name">Street Name</label>
                     <input type="text" class="form-control" id="street_name" name="street_name" value="{{$customer->street_name}}">
              </div>
              <div class="col-sm-6" style="padding: 0px;">
                 <div class="form-group">
                     <label for="city">City</label>
                     <input type="text" class="form-control" id="city" style="width: 230px;" name="city" value="{{$customer->city}}">
                 </div>
              </div>
              <div class="col-sm-6">
                  <div class="form-group">
                     <label for="state">State:</label>
                     <input type="text" class="form-control" id="state" name="state" style="width: 235px;" value="{{$customer->state}}">
                  </div>
               </div>
              <div class="col-sm-6" style="padding: 0px;">
                 <div class="form-group">
                     <label for="pincode">Pincode:</label>
                     <input type="text" class="form-control" id="pincode" style="width: 230px;" name="pincode" value="{{$customer->pincode}}">
                 </div>
              </div>
              
               <div class="col-sm-6">
                  <div class="form-group">
                      <label for="country">country:</label>
                      <input type="text" class="form-control" id="country" name="country" style="width: 235px;" value="{{$customer->country}}">
                  </div>
               </div>
              <div>
                 <button type="submit" class="btn btn-primary">Update</button>
              </div>
          </form>
     </div>
</div>

  @endsection
                      
