@extends('layouts.app')

@section('content')
<h2 style="padding: 2px;">Audit Management</h2>
<div class="row">
    
        <div class="col-lg-12 margin-tb"> 
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('auditmanagement.create') }}"> Create New</a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>Customer Name</th>
            <th>ISO Service Name</th>
            <th>Accreditation Name</th>
            <th>Certification Body</th>
            <th>Auditor Name</th>
            <th>Audit Date</th>
            <th>Audit Type</th>
            <th>Audit Status</th>
            <th>Certification Date</th>
            <th>Certification Price</th>
            <th>Certification Status</th>
            <!-- <th>Details</th> -->
            <th width="150px">Action</th>
        </tr>
        @foreach ($auditmanagements as $auditmanagement)
            <tr>
                <td>{{ $auditmanagement->customer->cust_name }}</td>
                <td>{{ $auditmanagement->product->name }}</td>
                <td>{{ $auditmanagement->certificationBody->accreditation }}</td>
                <td>{{ $auditmanagement->certificationBody->certification_body_name }}</td>
                <td>{{ $auditmanagement->auditor_name }}</td>
                <td>{{ $auditmanagement->audit_date }}</td>
                <td>{{ $auditmanagement->audit_type }}</td>
                <td>{{ $auditmanagement->audit_status }}</td>
                <td>{{ $auditmanagement->certification_date }}</td>
                <td>{{ $auditmanagement->certification_price }}</td>
                <td>{{ $auditmanagement->certification_status }}</td>
                <td>
                    <form action="{{ route('auditmanagement.destroy',$auditmanagement->id) }}" method="POST">

                        <!-- <a class="btn btn-info" href="{{ route('auditmanagement.show',$auditmanagement->id) }}">Show</a>
 -->


                        <a class="btn btn-primary" href="{{ route('auditmanagement.edit',$auditmanagement->id) }}">Edit</a>

                        @csrf
                        {{--@method('DELETE')--}}

                        {{--<button type="submit" class="btn btn-danger">Delete</button>--}}
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

@endsection