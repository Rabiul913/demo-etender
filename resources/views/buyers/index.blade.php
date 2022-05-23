
@extends('layouts.app')


@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Buyers</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/home">Home</a></li>
              <li class="breadcrumb-item active">Buyers</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">

            <div class="pull-right">
                @can('buyer-create')
                <a class="btn btn-success" href="{{ route('buyers.create') }}"> Create New Buyer</a>
                @endcan
            </div>
    @if ($message = Session::get('success'))
    <br>
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
<br>
            
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Buyer Name</th>
            <th>Address</th>
            <th>Country</th>
            <th>National ID.</th>
            <th>Email</th>
            <th>Contact</th>
            <th>Action</th>
        </tr>
	    @foreach ($buyers as $buyer)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ $buyer->b_name }}</td>
	        <td>{{ $buyer->b_address }}</td>
            <td>{{ $buyer->b_country }}</td>
            <td>{{ $buyer->b_nid }}</td>
          <td>{{ $buyer->b_email }}</td>
          <td>{{ $buyer->b_phone }}</td>
       
          </td>
	        <td>
                <form action="{{ route('buyers.destroy',$buyer->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('buyers.show',$buyer->id) }}">Show</a>
                    @can('buyer-edit')
                    <a class="btn btn-primary" href="{{ route('buyers.edit',$buyer->id) }}">Edit</a>
                    @endcan

                    @csrf
                    @method('DELETE')
                    @can('buyer-delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    @endcan
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>

    {!! $buyers->links() !!}
</div>
</div>
</div>
</div>
</div>
@endsection