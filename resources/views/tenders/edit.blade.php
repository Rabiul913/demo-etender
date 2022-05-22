
@extends('layouts.app')


@section('content')
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Tender</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/home">Home</a></li>
              <li class="breadcrumb-item active">Tender</li>
              <li class="breadcrumb-item active">Edit Tender</li>
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

    <form action="{{ route('tenders.update',$tender->id) }}" method="POST" enctype="multipart/form-data">
      @method('put')
    	@csrf
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Subject:</strong>
                    <input type="text" name="subject" value="{{ $tender->subject }}" class="form-control" placeholder="subject">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Details:</strong>
                        <textarea class="form-control" name="detail">{{ $tender->detail }}</textarea>
                </div>
            </div>

            <div class="col-xs-12 col-lg-6 col-md-12">
                <div class="form-group">
                    <strong>Create Date:</strong>
                    <input class="form-control" type="datetime-local" id="create_date" value="{{ $tender->create_date > 0 ? date("Y-m-d\TH:i:s", strtotime($tender->create_date)) : '' }}" name="create_date">
                </div>
              </div>
      
              <div class="col-xs-12 col-lg-6 col-md-12">
                <div class="form-group">
                    <strong>Publish Date:</strong>
                    <input class="form-control" type="datetime-local" id="publish_date" value="{{ $tender->publish_date > 0 ? date("Y-m-d\TH:i:s", strtotime($tender->publish_date)) : '' }}" name="publish_date">
                </div>
              </div>
      
              <div class="col-xs-12 col-lg-6 col-md-12">
                <div class="form-group">
                    <strong style="padding-right: 27px">Deadline:</strong>
                    <input class="form-control" type="datetime-local" id="deadline"  value="{{ $tender->deadline > 0 ? date("Y-m-d\TH:i:s", strtotime($tender->deadline)) : '' }}" name="deadline">
                </div>
              </div>

              <div class="col-xs-12 col-lg-6 col-md-12">
                <strong>Attachment:</strong>
                <div class="custom-file"><br>
                  <input type="file" class="custom-file-input" name="file">
                  <label class="custom-file-label" for="customFile">Choose file</label>
                  <iframe src="/file/tender/{{ $tender->file }}" height="200" style="min-width: 515px" width="auto"></iframe>
                </div>
                {{-- <div class="form-group">
                    <input class="form-control" type="file" name="file">
                    <iframe src="/file/tender/{{ $tender->file }}" height="200" style="min-width: 515px" width="auto"></iframe>
                </div> --}}
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