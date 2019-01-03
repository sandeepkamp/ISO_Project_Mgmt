@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2></h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('certificationinfo.create') }}"> Create New</a>
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
            <th>Certification Body</th>
            <th>Price</th>
            <th>Status</th>
            <!-- <th>Details</th> -->
            <th width="280px">Action</th>
        </tr>
        @foreach ($certifications as $certification)
            <tr>
                <td>{{ $certification->customer->cust_name }}</td>
                <td>{{ $certification->product->name }}</td>
                <td></td>
                <td>{{ $certification->price }}</td>
                <td>{{ $certification->status }}</td>
                <td>
                    <form action="{{ route('certificationinfo.destroy',$certification->id) }}" method="POST">

                    <!-- <a class="btn btn-info" href="{{ route('certificationinfo.show',$certification->id) }}">Show</a>
 -->


                        <a class="btn btn-primary" href="{{ route('certificationinfo.edit',$certification->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

@endsection