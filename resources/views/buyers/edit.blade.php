@extends('layouts.app')


@section('content')
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Buyer</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/home">Home</a></li>
              <li class="breadcrumb-item active">Buyer</li>
              <li class="breadcrumb-item active">Edit Buyer</li>
            </ol>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('buyers.index') }}"> Back</a>
            </div>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">


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

    <form action="{{ route('buyers.update',$buyer->id) }}" method="POST">
        @method('put')
    	@csrf
         <div class="row">
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Buyer Name:</strong>
		            <input type="text" name="b_name" value="{{ $buyer->b_name }}" class="form-control" placeholder="buyer name">
		        </div>
		    </div>
            <div class="col-xs-12 col-lg-6 col-md-12">
                <div class="form-group">
                    <strong>Email: </strong>
                    <input class="form-control" type="email" value="{{ $buyer->b_email}}" id="create_date" name="b_email">
                </div>
              </div>
      
              <div class="col-xs-12 col-lg-6 col-md-12">
                <div class="form-group">
                    <strong>Contact No.:</strong>
                    <input class="form-control" type="phone" id="b_phone" value="{{ $buyer->b_phone }}" name="b_phone">
                </div>
              </div>
		
            <div class="col-xs-12 col-lg-6 col-md-12">
                <div class="form-group">
                    <strong>Country: </strong>
                    <input class="form-control" type="text" id="create_date" value="{{ $buyer->b_country }}" name="b_country">
                </div>
              </div>
            <div class="col-xs-12 col-lg-6 col-md-12">
                <div class="form-group">
                    <strong>National ID.: </strong>
                    <input class="form-control" type="number" id="create_date" value="{{ $buyer->b_nid }}" name="b_nid">
                </div>
              </div>

              <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Address:</strong>
                <textarea class="form-control" name="b_address" cols="3">{{ $buyer->b_address }}</textarea>
		        </div>
		    </div>

		    <div class="col-xs-12 col-sm-12 col-md-12 text-center my-3">
		            <button type="submit" class="btn btn-primary">Submit</button>
		    </div>
		</div>
    </form>
</div>
</div>
</div>
</div>
</div>

@endsection