@extends('layouts.app')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('certifications.index') }}"> Back</a>
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
   
<form action="{{ route('certifications.store') }}" method="POST">
    @csrf
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
                <strong>Certificate Body</strong>
                <input type="text" id="certification_body_name" name="certification_body_name" class="form-control" placeholder="Certification Body">
            </div>
        </div>
     </div>
     <div class="row">
        <div class="col-md-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Accreditation</strong>
                <input type="text" class="form-control" id="accreditation" name="accreditation" placeholder="Accreditation">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
@endsection