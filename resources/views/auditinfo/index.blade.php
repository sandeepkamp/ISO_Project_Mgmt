@extends('layouts.app')

@section('content')
    <!-- <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2></h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('auditinfo.create') }}"> Create New</a>
            </div>
        </div>
    </div> -->
    <h1 style="padding: 5px;">Audit Information</h1>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>Customer Name</th>
            <th>Customer Email</th>
            <th>ISO Service Name</th>
            <th>Auditor Name</th>
            <!-- <th>Certification Body</th>
            <th>Accreditation</th> -->
            <th>Last Audit Date</th>
            <th>Last Audit Type </th>
            <th>Next Audit Date </th>
            <th>Next Audit Type</th>
            <!-- <th>Status</th> -->
            <!-- <th>Details</th> -->
            <!-- <th width="280px">Action</th> -->
            <th width="80px">Action</th>
        </tr>
        @foreach ($auditinfos as $auditinfo)
            <tr>
               <td>{{ $auditinfo->customer->cust_name }}</td>
               <td>{{ $auditinfo->customer->cust_email }}</td>
               <td>{{ $auditinfo->auditmanagement->product->name }}</td>
               <td>{{ $auditinfo->auditmanagement->auditor_name }}</td>
             
               <td>{{ $auditinfo->last_audit_date }}</td>
               <td>{{ $auditinfo->last_audit_type }}</td>
               <td>{{ $auditinfo->next_audit_date }}</td>
               <td>{{ $auditinfo->next_audit_type }}</td>
               <!-- <td>{{ $auditinfo->status }}</td> -->

                <td>
                    <form action=" " method="POST">

                    <!-- <a class="btn btn-info" href="{{ route('auditinfo.show',$auditinfo->id) }}">Show</a>
 -->


                        <a class="btn btn-primary" href="{{ route('auditinfo.edit',$auditinfo->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <!-- <button type="submit" class="btn btn-danger">Delete</button> -->
                    </form>
                </td>
            </tr>
       @endforeach
    </table>

@endsection