@extends('layouts.app')
  
@section('content')

<div class="pull-right">
    <a class="btn btn-primary" href="{{ route('auditmanagement.index') }}"> Back</a>
</div>

<div class="row">
    <div class="col-md-6">
        <h1>Edit Details</h1>
        <form action="{{route('auditmanagement.update', ['id' => $auditmgmt->id])}}" method="post">
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

            <!-- <div class="row">
              <div class="col-md-6 col-sm-6 col-md-6">
                   <select name="customer_id" class="form-control">
                     <option>Select Customer</option><!--selected by default-->
                        <!-- @foreach ($customers as $customer)
                      <option  value="{{ $customer->id }}"
                        @if($customer->id == $cust->id)
                        selected
                        @endif
                      >{{ $customer->cust_name }}</option>
                     @endforeach -->
                    <!-- </select>
               </div>
            </div><br> -->
            <div class="form-group">
                 <label for="customer_name">Customer Name</label>
                 <input type="customer_name" readonly class="form-control" id="cust_name"  name="customer_id" value="{{$cust->cust_name}}">
            </div>
            <!-- <div class="row">
              <div class="col-md-6 col-sm-6 col-md-6">
                   <select name="certification_body_id" class="form-control">
                     <option>Select Certification Body</option><!--selected by default-->
                        <!-- @foreach ($certificates as $certificate)
                      <option  readonly value="{{ $certificate->id }}"
                        @if($certificate->id == $certificationbody->id)
                        selected
                        @endif
                      >{{ $certificate->certification_body_name }}</option>
                     @endforeach
                    </select> -->
               <!-- </div>
            </div><br> -->
                <div class="form-group">
                 <label for="certification_body">Certification Body</label>
                 <input type="certification_body" readonly class="form-control" id="certification_body_name"   name="certification_body_id" value="{{$certificate->certification_body_name}}">
                </div>
            <!-- <div class="row">
              <div class="col-md-6 col-sm-6 col-md-6">
                   <select name="certification_body_id" class="form-control">
                     <option>Select Customer</option><!--selected by default-->
                        <!-- @foreach ($certificates as $certificate)
                      <option  readonly value="{{ $certificate->id }}"
                        @if($certificate->id == $certificationbody->id)
                        selected
                        @endif
                      >{{ $certificate->accreditation }}</option>
                     @endforeach
                    </select> -->
               <!-- </div>
            </div><br> --> 

            <div class="form-group">
                 <label for="accredetation">Accredetation</label>
                 <input type="accredetation" readonly class="form-control" id="accreditation"   name="certification_body_id" value="{{$certificate->accreditation}}">
            </div>
                     
            <!-- <div class="row">
              <div class="col-md-6 col-sm-6 col-md-6">
                   <select name="iso_service_id" class="form-control">
                     <option>Select ISO</option><!--selected by default-->
                        <!-- @foreach ($products as $product)
                      <option value="{{ $product->id }}"
                        @if($product->id == $iso->id)
                        selected
                        @endif
                      >{{ $product->name }}</option>
                     @endforeach
                    </select> -->
               <!-- </div>
            </div><br> -->

             <div class="form-group">
                 <label for="ISO">ISO</label>
                 <input type="ISO" readonly class="form-control" id="ISO"   name="iso_service_id" value="{{$product->name}}">
            </div>
              <div class="form-group">
                 <label for="auditor_name">Auditor Name</label>
                 <input type="auditor_name" class="form-control" id="auditor_name"  name="auditor_name" value="{{$auditmgmt->auditor_name}}">
              </div>
            <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label class="bmd-label-floating">Audit Date</label>
                    <input type="date" class="form-control" name="audit_date" value="{{ $auditmgmt->audit_date }}">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label class="bmd-label-floating">Audit Type</label>
                    <input type="text" class="form-control" name="audit_type" id="audit_type" readonly value="{{ $auditmgmt->audit_type }}">
                </div>
            </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                <label class="bmd-label-floating">Audit Status</label>
                    <select name="audit_status" class="form-control" id="audit_status">
                        <option value="audit_pending"<?php if($auditmgmt['audit_status'] == 'audit_pending') { ?> selected="selected"<?php } ?>>Audit Pending</option>
                        <option value="audit_in_process"<?php if($auditmgmt['audit_status'] == 'audit_in_process') { ?> selected="selected"<?php } ?>>Audit In Process</option>
                        <option value="audit_done"<?php if($auditmgmt['audit_status'] == 'audit_done') { ?> selected="selected"<?php } ?>>Audit Done</option>
                    </select>
               </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="bmd-label-floating">Certification Date</label>
                        <input type="date" class="form-control" name="certification_date" value="<?php echo date("Y-m-d");?>">
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <label class="bmd-label-floating">Certification Status</label>
                <select name="certification_status" class="form-control" id="certification_status">
                    <option value="certification_pending"<?php if($auditmgmt['certification_status'] == 'certification_pending') { ?> selected="selected"<?php } ?>>Certification Pending</option>
                    <option value="certification_done"<?php if($auditmgmt['certification_status'] == 'certification_done') { ?> selected="selected"<?php } ?>>Certification Done</option>
                </select>
            </div>


            <div class="row">
                <div class="col-md-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <label class="bmd-label-floating">Certification Price</label>
                        <input type="text" name="certification_price" class="form-control" placeholder="Certification Price" id="certification_price">
                    </div>
                </div>
            </div>

    

                 <div>
                    <button type="submit" class="btn btn-primary">Update</button>
                 </div>
          </form>
     </div>
</div>

  @endsection
                      
