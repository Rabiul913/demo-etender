
@extends('layouts.app')


@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Show User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            {{-- <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/home">Home</a></li>
              <li class="breadcrumb-item active">User</li>
              <li class="breadcrumb-item active">Show User</li>
            </ol> --}}
            <div class="pull-right">
                <a class="btn btn-primary btn-sm float-right" href="{{ route('users.index') }}"> Back</a>
            </div>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-4"  style="left: 25%;">
            <div class="content-form">


          <!-- Profile Image -->
          <div class="box box-primary" style="background-color: white; padding:20px">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle center" src="/dist/img/user2.png" alt="User profile picture">

              <h3 class="profile-username text-center">{{ $user->name }}</h3>

              <p class="text-muted text-center"> @if(!empty($user->getRoleNames()))
                @foreach($user->getRoleNames() as $v)
                    <label class="badge badge-success">{{ $v }}</label>
                @endforeach
            @endif</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Email: </b> <span class="text-right">{{ $user->email }}</span>
                </li>
                <li class="list-group-item">
                  <b>Mobile: </b> <span class="text-right">{{ $user->phone }}</span>
                </li>
                <li class="list-group-item">
                  <b>Address: </b> <span class="text-right">{{ $user->address }}</span>
                </li>
              </ul>

              {{-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> --}}
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
    

</div>
</div>
</div>
</div>
</div>
</div>

@endsection