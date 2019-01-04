@extends('layouts.app')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Audit Management</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('auditmanagement.index') }}"> Back</a>
        </div>
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('auditmanagement.store') }}" method="POST">
    @csrf

     <div class="row">
       <div class="col-md-6 col-sm-6 col-md-6">
           <select name="customer_name" class="form-control">
                <option>Select Customer</option><!--selected by default-->
               @foreach ($customers as $customer)
                   <option value="{{ $customer->id }}">{{ $customer->cust_name }}</option>
               @endforeach
           </select>
       </div>
    </div><br>

    <div class="row">
       <div class="col-md-6 col-sm-6 col-md-6">
           <select name="iso_service_name" class="form-control">
                <option>Select ISO</option><!--selected by default-->
               @foreach ($products as $product)
                   <option value="{{ $product->id }}">{{ $product->name }}</option>
               @endforeach
           </select>
       </div>
    </div><br>
  
     <div class="row">
        <div class="col-md-6 col-sm-6 col-md-6">
            <div class="form-group">
            <label class="bmd-label-floating">Auditor Name</label>
                <input type="text" name="auditor_name" class="form-control" placeholder="Auditor Name">
            </div>
        </div>
     </div>
     <div class="row">
         <div class="col-sm-3">
             <div class="form-group">
                 <label class="bmd-label-floating">Audit Date</label>
                 <input type="date" class="form-control" name="audit_date"  id="audit_date" value="">
             </div>
         </div>
         <div class="col-sm-3">
             <div class="form-group">
                 <label class="bmd-label-floating">Audit Type</label>
                     <input type="text" class="form-control" name="audit_type" value="Certification" readonly>

             </div>
         </div>
     </div>
     <!-- <div class="row">
         <div class="col-sm-4">
             <div class="form-group">
                 <label class="bmd-label-floating">Certificate Date</label>
                 <input type="date" class="form-control" name="certificate_date" value="">
             </div>
         </div>
     </div> -->

    <div class="row">
        <div class="col-md-6 col-sm-6 col-md-6">
            <select id="select_status" name="status" class="form-control">
                <option>Select Audit Status</option><!--selected by default-->
                <option value="audit_pending">Audit Pending</option>
                <!-- <option id ="2" value="audit_in_process">Audit In Process</option> -->
                <option id ="3" value="audit_done">Audit Done</option>
            </select>
        </div>
    </div><br>

    <div class="row">
        <div class="col-md-6 col-sm-6 col-md-6">
            <label class="bmd-label-floating">Certification Body Name</label>
            <select name="certification_name" id="certification_name"  class="form-control">
                <option>Select Certification Body->Accreditation</option><!--selected by default-->
                @foreach ($certifications as $certification)
                    <option value="{{ $certification->id }}">{{ $certification->certification_body_name }}->{{ $certification->accreditation }}</option>
                @endforeach
            </select>
        </div>
    </div><br>

    <div class="row">
        <div class="col-md-6 col-sm-6 col-md-6">
            <div class="form-group">
                <label class="bmd-label-floating">Certification Price</label>
                <input type="text" name="price" class="form-control" placeholder="Certification Price">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-sm-6 col-md-6">
            <label class="bmd-label-floating">Certification Status</label>
            <select id="select_certification_status" name="certification_status" class="form-control">
                <option>Select Certification Status</option><!--selected by default-->
                <option value="certification_pending">Certification Pending</option>
                <option id ="3" value="certification_done">Certification Done</option>
            </select>
        </div>
    </div><br>

    <div class="row">
        <div class="col-md-6 col-sm-6 col-md-6">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>
@endsection


