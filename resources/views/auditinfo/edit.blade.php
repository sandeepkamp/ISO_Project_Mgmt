@extends('layouts.app')

@section('content')
    <div class ="col-md-6" style="margin-right: 320px;">
        <h1>Audit Information</h1>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


                <form action="{{route('auditinfo.update', ['id' => $audit->id])}}" method="post">
                    @csrf
                    @method('PUT')
                <div class="row">
                <div class="col-md-6 col-sm-6 col-md-6">
                    <label class="bmd-label-floating">Customer Name</label>
                    <input type="text" name="customer_name" class="form-control" value="{{ $audit->customer->cust_name }}">
                </div>
            </div><br>

            <div class="form-group">
                <label for="auditor_name">Auditor Name</label>
                <input type="text" class="form-control" id="auditor_name" name="auditor_name" value="{{ $audit->auditmanagement->auditor_name }}">
            </div>

            <div class="form-group">
                 <label for="ISO">ISO</label>
                 <input type="ISO" readonly class="form-control" id="ISO"   name="iso_service_id" value="{{$audit->auditmanagement->product->name}}">
            </div>



            {{--<div class="row">--}}
            {{--<div class="col-sm-6">--}}
            {{--<div class="form-group">--}}
            {{--<label class="bmd-label-floating">Audit Date</label>--}}
            {{--<input type="date" class="form-control" name="audit_date" value="{{ $audit->last_audit_date }}">--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-sm-6">--}}
            {{--<div class="form-group">--}}
            {{--<label class="bmd-label-floating">Audit Type</label>--}}
            {{--<input type="text" class="form-control" name="audit_type">--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}

            <!-- <div class="form-group">
                <label for="certification_body">Certification Body</label>
                <input type="text" class="form-control" id="certification_body" placeholder="Certification Body" name="certification_body" value="{{ $audit->auditmanagement->certificationBody->certification_body_name }}">
            </div>

            <div class="form-group">
                <label for="certification_body">Accreditation Body</label>
                <input type="text" class="form-control" id="certification_body" placeholder="Accreditation Body" name="certification_body" value="{{ $audit->auditmanagement->certificationBody->accreditation }}">
            </div> -->
            <!-- <div class="form-group">
                <label for="certification_body">Price</label>
                <input type="text" class="form-control" id="Price" placeholder="Price" name="Price">
            </div> -->

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="bmd-label-floating">Last Audit Date</label>
                        <input type="date" id="last_audit_date" class="form-control" name="last_audit_date" value="{{ $audit->last_audit_date }}">
                    </div>
                </div>
                <!-- <div class="col-sm-6">
                    <div class="form-group">
                        <label for="audit_type">Last Audit Type</label>
                        <input type="text" class="form-control" id="last_audit_type" placeholder="" name="last_audit_type" value="{{ $audit->last_audit_type }}">
                    </div>
                </div>
            </div> -->
            <div class="row">
                <div class="col-sm-6">
                <label class="bmd-label-floating">Last Audit Type</label>
                    <select name="last_audit_type" class="form-control" id="last_audit_type">
                        <option value="certification"<?php if($audit['last_audit_type'] == 'certification') { ?> selected="selected"<?php } ?>>Certification</option>
                        <option value="first_surveillance"<?php if($audit['last_audit_type'] == 'first_surveillance') { ?> selected="selected"<?php } ?>>First Survelliance</option>
                        <option value="second_surveillance"<?php if($audit['last_audit_type'] == 'second_surveillance') { ?> selected="selected"<?php } ?>>Second Survelliance</option>
                        <option value="recertification"<?php if($audit['last_audit_type'] == 'recertification') { ?> selected="selected"<?php } ?>>Recertification</option>
                    </select>
               </div>
           </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="bmd-label-floating">Next Audit Date</label>
                        <input type="date" class="form-control" id="next_audit_date" name="next_audit_date" value="">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="audit_type">Next Audit Type</label>
                        <input type="text" class="form-control" id="next_audit_type" placeholder="" name="next_audit_type" value="{{ $audit->next_audit_type }}">
                    </div>
                </div>
            </div>
            <!-- <div class="row">
                <div class="col-sm-6">
                <label class="bmd-label-floating">Next Audit Type</label>
                    <select name="next_audit_type" class="form-control" id="next_audit_type">
                        <option value="certification"<?php if($audit['next_audit_type'] == 'certification') { ?> selected="selected"<?php } ?>>Certification</option>
                        <option value="first_surveillance"<?php if($audit['next_audit_type'] == 'first_surveillance') { ?> selected="selected"<?php } ?>>First Survelliance</option>
                        <option value="second_surveillance"<?php if($audit['next_audit_type'] == 'second_surveillance') { ?> selected="selected"<?php } ?>>Second Survelliance</option>
                        <option value="recertification"<?php if($audit['next_audit_type'] == 'recertification') { ?> selected="selected"<?php } ?>>Recertification</option>
                    </select>
               </div>
           </div> -->
            <div class="row">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
@endsection

<!-- <script>
 $("#last_audit_date").datepicker({
    minDate: 0,
    dateFormat: "yy-mm-dd",
    maxDate: '+364D',
    onSelect: function() {
       var date = new Date($(this).val());
        var ret = new Date(date.setDate(date.getDate() + 364));
      var year = ret.getFullYear(), month = (ret.getMonth()), day = ret.getDate();  
       $("#next_audit_date").val(year+"-"+month+"-"+day);
       
        
    }
});
</script> -->