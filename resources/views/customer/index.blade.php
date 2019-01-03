@extends('layouts.app')
 
@section('content')
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="row" style="margin-right: 330px;">
    <h1 style="padding-left: 17px;">Customer List</h1><br>
    </div>
    <table class="table table-bordered">
        <tr>
            <th>Customer Name</th>
            <th>Phone number</th>
            <th>Email</th>
            <th width="210px">Action</th>
        </tr>
        @foreach($customers as $customer)
        <tr>
           <td>{{$customer->cust_name}}</td>
           <td>{{$customer->cust_phone_number}}</td>
           <td>{{$customer->cust_email}}</td>
           <td>
                <form action="{{ route('customer.destroy',$customer->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('customer.show',$customer->id) }}">Show</a>

 
    
                    <a class="btn btn-primary" href="{{ route('customer.edit',$customer->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    
      
@endsection