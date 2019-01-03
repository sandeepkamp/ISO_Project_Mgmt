@extends('layouts.app')
  
@section('content')

<div class="pull-right">
    <a class="btn btn-primary" href="{{ route('certifications.index') }}"> Back</a>
</div>

<div class="row">
    <div class="col-md-6">
                <h1>Edit Details</h1>
                    <form action="{{route('certifications.update', ['id' => $certificationbody->id])}}" method="post">
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
                     
            <div class="row">
              <div class="col-md-6 col-sm-6 col-md-6">
                   <select name="iso_service_id" class="form-control">
                     <option>Select ISO</option><!--selected by default-->
                        @foreach ($products as $product)
                      <option value="{{ $product->id }}"
                        @if($product->id == $iso->id)
                        selected
                        @endif
                      >{{ $product->name }}</option>
                     @endforeach
                    </select>
               </div>
            </div><br>
              <div class="form-group">
                 <label for="certification_body_name">Certificate Body</label>
                 <input type="certification_body_name" class="form-control" id="certification_body_name"  name="certification_body_name" value="{{$certificationbody->certification_body_name}}">
              </div>
              <div class="form-group">
                  <label for="accreditation">Accredetation</label>
                  <input type="accreditation" class="form-control" id="accreditation" name="accreditation" value="{{$certificationbody->accreditation}}" >
        
              <div>
                 <button type="submit" class="btn btn-primary">Update</button>
              </div>
          </form>
     </div>
</div>

  @endsection
                      
