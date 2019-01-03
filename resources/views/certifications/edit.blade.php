@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Audit</h2>
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

    <form action="{{route('auditmanagement.update', ['id' => $audit->id])}}" method="post">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label class="bmd-label-floating">Customer Name</label>
                    <input type="text" name="customer_name" class="form-control" placeholder="Auditor Name" value="{{ $audit->customer->cust_name }}">
                </div>
            </div>
        </div><br>

        <div class="row">
            <div class="col-md-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label class="bmd-label-floating">ISO Name</label>
                    <input type="text" name="iso_name" class="form-control"  value="{{ $audit->product->name }}">
                </div>
            </div>
        </div><br>

        <div class="row">
            <div class="col-md-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label class="bmd-label-floating">Auditor Name</label>
                    <input type="text" name="auditor_name" class="form-control"  value="{{ $audit->auditor_name }}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <label class="bmd-label-floating">Audit Date</label>
                    <input type="date" class="form-control" name="audit_date" value="{{ $audit->audit_date }}">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label class="bmd-label-floating">Audit Type</label>
                    <input type="text" class="form-control" name="audit_type" value="Certification" readonly value="{{ $audit->Certification }}">

                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-sm-4">
                <div class="form-group">
                    <label class="bmd-label-floating">Certificate Date</label>
                    <input type="date" class="form-control" name="audit_date" value="">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 col-sm-6 col-md-6">
                <select name="status" class="form-control">
                    <option value="audit_pending"<?php if($audit['status'] == 'audit_pending') { ?> selected="selected"<?php } ?>>Audit Pending</option>
                    <option value="audit_in_process"<?php if($audit['status'] == 'audit_in_process') { ?> selected="selected"<?php } ?>>Audit In Process</option>
                    <option value="audit_done"<?php if($audit['status'] == 'audit_done') { ?> selected="selected"<?php } ?>>Audit Done</option>
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