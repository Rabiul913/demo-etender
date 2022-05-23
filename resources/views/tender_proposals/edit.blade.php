
@extends('layouts.app')


@section('content')
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Tender Proposal</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            {{-- <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/home">Home</a></li>
              <li class="breadcrumb-item active">Tender Proposal</li>
              <li class="breadcrumb-item active">Edit Tender Proposal</li>
            </ol> --}}
            <div class="pull-right">
                <a class="btn btn-primary btn-sm float-right" href="{{ route('proposals.index') }}"> Back</a>
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
            <div class="content-form">
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

    <form action="{{ route('proposals.update',$proposal->id) }}" method="POST" enctype="multipart/form-data">
      @method('put')
    	@csrf
         <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <input type="hidden" name="user_id" class="form-control" value="{{ $proposal->user_id }}">
		        </div>
		    </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-group">
              <input type="hidden" name="tender_id" class="form-control" value="{{ $proposal->tender_id }}">
          </div>
      </div> 
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Subject:</strong>
		            <input type="text" name="tender_subject" class="form-control" value="{{ $proposal->tender_subject }}" placeholder="subject" readonly>
		        </div>
		    </div>
		   
        <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-group">
            <strong>Total Amount(including Vat & Tax):</strong>
            <input class="form-control" type="text" id="total_amount" name="total_amount" value="{{ $proposal->total_amount }}" readonly>
          </div>
        </div>

        <div class="col-xs-12 col-lg-6 col-md-12">
          <div class="form-group">
              <strong>Delivery Date:</strong>
              <input class="form-control" type="date" id="delivery_date" value="{{date("Y-m-d", strtotime($proposal->delivery_date)) }}" name="delivery_date" readonly>
          </div>
      </div>
      <div class="col-xs-12 col-lg-6 col-md-12">
        <div class="form-group">
          <strong>Status:</strong>
            <select class="form-control" name="status" id="status">
              <option @if($proposal->status == 0) selected="true" @endif value=0>Submitted</option>
              <option @if($proposal->status == 1) selected="true" @endif value=1>Short Listed</option>
              <option @if($proposal->status == 2) selected="true" @endif value=2>Finalize</option>
            </select>
        </div>
      </div>

      
      <div class="col-xs-12 col-lg-12 col-md-12">
        <strong>Offer:</strong>
        <div class="form-group">
            
            <iframe src="/file/tender/proposal/{{ $proposal->file }}" height="200" width="100%"></iframe>
        </div>
      </div>
		    <div class="col-xs-12 col-sm-12 col-md-12 text-center my-3">
		            <button type="submit" class="btn btn-primary">Submit</button>
		    </div>
		</div>
    </form>
</div></div>
</div>
</div>
</div>
</div>

@endsection