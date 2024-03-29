
@extends('layouts.app')


@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Show Permission</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/home">Home</a></li>
              <li class="breadcrumb-item active">Permissions</li>
              <li class="breadcrumb-item active">Show Permission</li>
            </ol>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('permissions.index') }}"> Back</a>
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

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Permission Name:</strong>
                {{ $permission->name }}
            </div>
        </div>
        
    </div>
</div>
</div>
</div>
</div>
</div>

@endsection

