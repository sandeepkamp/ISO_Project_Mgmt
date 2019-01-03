@extends('layouts.app')
 
@section('content')
<h2 style="padding: 2px;">Certification Info</h2>
    <div class="row">
    
        <div class="col-lg-12 margin-tb"> 
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('certifications.create') }}"> Create New</a>
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
            <th>ISO</th>
            <th>Certification Body</th>
            <th>Accreedetation</th>
            <!-- <th>Details</th> -->
            <th width="150px">Action</th>
        </tr>
        @foreach ($certificationbodys as $certificationbody)
        <tr>
            <td>{{ $certificationbody->product->name }}</td>
            <td>{{ $certificationbody->certification_body_name }}</td>
            <td>{{ $certificationbody->accreditation }}</td>
            <td>
                <form action="{{ route('certifications.destroy',$certificationbody->id) }}" method="POST">
   
                    <!-- <a class="btn btn-info" href="{{ route('certifications.show',$certificationbody->id) }}">Show</a> -->

 
    
                    <a class="btn btn-primary" href="{{ route('certifications.edit',$certificationbody->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
      
@endsection