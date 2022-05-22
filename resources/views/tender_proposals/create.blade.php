
@extends('layouts.app')




@section('content')
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Create Tender Proposal</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/home">Home</a></li>
              <li class="breadcrumb-item active">Tender Proposal</li>
              <li class="breadcrumb-item active">Create Tender Proposal</li>
            </ol>
            <div class="pull-right">
                {{-- <a class="btn btn-primary" href="{{ route('tenders.index') }}"> Back</a> --}}
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

    <form action="{{ route('proposals.store') }}" method="POST" enctype="multipart/form-data">
    	@csrf
         <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <input type="hidden" name="user_id" class="form-control" value="{{ Auth::user()->id }}">
		        </div>
		    </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-group">
              <input type="hidden" name="tender_id" class="form-control" value="{{ $tender->id }}">
          </div>
      </div>
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Subject:</strong>
		            <input type="text" name="tender_subject" class="form-control" value="{{ $tender->subject }}" placeholder="subject" readonly>
		        </div>
		    </div>
		   
        <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-group">
            <strong>Total Amount(including Vat & Tax):</strong>
            <input class="form-control" type="text" id="total_amount" value="{{ old('total_amount') }}" name="total_amount">
          </div>
        </div>

        <div class="col-xs-12 col-lg-6 col-md-12">
          <div class="form-group">
              <strong>Delivery Date:</strong>
              <input class="form-control" type="datetime-local" value="{{ old('delivery_date') }}" id="delivery_date" name="delivery_date">
          </div>
      </div>
      <div class="col-xs-12 col-lg-6 col-md-12">
        <div class="form-group">
            <strong  class="">Offer Letter::</strong>
            <input class="form-control" type="file" id="file" name="file">
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