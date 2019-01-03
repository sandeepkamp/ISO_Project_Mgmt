@extends('layouts.app')
  
@section('content')
   <div class ="col-md-6" style="margin-right: 320px;">
      <h1>Audit Information</h1>
      <form action="{{route('auditinfo.store')}}" method="post">
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

               <div class="row">
                   <div class="col-md-6 col-sm-6 col-md-6">
                       <select name="name" class="form-control">
                           <option>Select Customer</option><!--selected by default-->
                           @foreach ($customers as $customer)
                               <option value="{{ $customer->id }}">{{ $customer->cust_name }}</option>
                           @endforeach
                       </select>
                   </div>
               </div><br>

           <div class="form-group">
              <label for="auditor_name">Auditor Name</label>
              <input type="auditor_name" class="form-control" id="auditor_name" placeholder="Enter Name" name="auditor_name">
           </div>
           


           {{--<div class="row">--}}
              {{--<div class="col-sm-6">--}}
              {{--<div class="form-group">--}}
                     {{--<label class="bmd-label-floating">Audit Date</label>--}}
                     {{--<input type="date" class="form-control" name="audit_date" value="">--}}
                {{--</div>--}}
              {{--</div>--}}
              {{--<div class="col-sm-6">--}}
                 {{--<div class="form-group">--}}
                     {{--<label class="bmd-label-floating">Audit Type</label>--}}
                     {{--<input type="text" class="form-control" name="audit_type">--}}
                {{--</div>--}}
              {{--</div>--}}
           {{--</div>--}}

            <div class="form-group">
               <label for="certification_body">Certification Body</label>
               <input type="text" class="form-control" id="certification_body" placeholder="Certification Body" name="certification_body">
            </div>

            <div class="form-group">
               <label for="certification_body">Accreditation Body</label>
               <input type="text" class="form-control" id="certification_body" placeholder="Accreditation Body" name="certification_body">
            </div>
               <div class="form-group">
                   <label for="certification_body">Price</label>
                   <input type="text" class="form-control" id="Price" placeholder="Price" name="Price">
               </div>

           <div class="row">
               <div class="col-sm-6">
               <div class="form-group">
                     <label class="bmd-label-floating">Last Audit Date</label>
                     <input type="date" class="form-control" name="last_audit_date" value="">
                </div>
               </div>
               <div class="col-sm-6">
                 <div class="form-group">
                     <label for="audit_type">Last Audit Type</label>
                     <input type="text" class="form-control" id="last_audit_type" placeholder="" name="last_audit_type">
                 </div>
               </div>
          </div>

          <div class="row">
               <div class="col-sm-6">
               <div class="form-group">
                     <label class="bmd-label-floating">Next Audit Date</label>
                     <input type="date" class="form-control" name="next_audit_date" value="">
                </div>
               </div>
               <div class="col-sm-6">
                 <div class="form-group">
                     <label for="audit_type">Next Audit Type</label>
                     <input type="text" class="form-control" id="next_audit_type" placeholder="" name="next_audit_type">
                 </div>
               </div>
          </div>
            <div class="row">
              <button type="submit" class="btn btn-primary">Submit</button>
           </div>
       </form>
  </div>
  @endsection

