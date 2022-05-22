
@extends('layouts.app')


@section('content')
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Create Tender</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/home">Home</a></li>
              <li class="breadcrumb-item active">Tender</li>
              <li class="breadcrumb-item active">Create Tender</li>
            </ol>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('tenders.index') }}"> Back</a>
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


    <form action="{{ route('tenders.store') }}" method="POST" enctype="multipart/form-data">
    	@csrf
         <div class="row">
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Subject:</strong>
		            <input type="text" name="subject" class="form-control" value="{{ old('subject') }}" placeholder="subject">
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Details:</strong>
                <textarea class="form-control" name="detail">{{ old('detail') }}</textarea>
		        </div>
		    </div>
        <div class="col-xs-12 col-lg-6 col-md-12">
          <div class="form-group">
              <strong>Create Date:</strong>
              <input class="form-control" type="date" value="{{ old('create_date') }}" id="create_date" name="create_date">
          </div>
        </div>

        <div class="col-xs-12 col-lg-6 col-md-12">
          <div class="form-group">
              <strong>Publish Date:</strong>
              <input  class="form-control" type="date" value="{{ old('publish_date') }}" id="publish_date" name="publish_date">
          </div>
        </div>

        <div class="col-xs-12 col-lg-6 col-md-12">
          <div class="form-group">
              <strong style="padding-right: 27px">Deadline:</strong>
              <input class="form-control" type="date" value="{{ old('deadline') }}" id="deadline" name="deadline">
          </div>
        </div>
        <div class="col-xs-12 col-lg-6 col-md-12">
          <strong>Attachment:</strong>
          <div class="custom-file">
            <input type="file" class="custom-file-input" value='{{ old('file') }}' name="file">
            <label class="custom-file-label" for="customFile">Choose file</label>
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