
@extends('layouts.app')


@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Profile</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            {{-- <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/home">Home</a></li>
              <li class="breadcrumb-item active">User</li>
              <li class="breadcrumb-item active">Profile</li>
            </ol> --}}
            <div class="pull-right">
                <a class="btn btn-primary btn-sm float-right" href="{{ route('home') }}"> Back</a>
            </div>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<div class="content">
      <div class="container-fluid">
        <div class="row">
          <div  @if ($role_name=="Vendor") class="col-lg-6" @else  class="col-lg-4" @endif style="left: 25%;">
          {{-- <div class="col-lg-12"> --}}
            <div class="content-form">

              @if ($message = Session::get('success'))
              <br>
              <div class="alert alert-success">
                <p>{{ $message }}</p>
              </div>
              @endif

              {{-- <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: {{ $data }}%" aria-valuenow="{{ $data }}" aria-valuemin="0" aria-valuemax="{{ $column }}"></div>
              </div> --}}
              @if ($role_name=="Vendor")
              <div class="progress">
                @php
                $per= round( $now*100/$max);
               @endphp
               @if ($per < 100)
               <div class="progress-bar" role="progressbar" style="background-color:red; width: {{ $now*100/$max }}%; border-radius:5px;" aria-valuenow="{{ $now }}" aria-valuemin="0" aria-valuemax="{{ $max }}">
                 
                {{ $per }}%
              </div>
              @else
              <div class="progress-bar" role="progressbar" style="width: {{ $now*100/$max }}%; border-radius:5px;" aria-valuenow="{{ $now }}" aria-valuemin="0" aria-valuemax="{{ $max }}">
                {{ $per }}%
              </div>
               @endif
                
              </div>
              @endif

 <!-- Profile Image -->
 <div class="box box-primary" style="background-color: white; padding:20px">
  <div class="box-body box-profile">
    <img class="profile-user-img img-responsive img-circle center" src="/dist/img/user2.png" alt="User profile picture">

    <h3 class="profile-username text-center">{{ $user->name }}</h3>


    @if ($role_name!="Vendor")
    <p class="text-muted text-center"> @if(!empty($user->getRoleNames()))
      @foreach($user->getRoleNames() as $v)
          <label class="badge badge-success">{{ $v }}</label>
      @endforeach
      @endif</p>
    @endif



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

    @if ($role_name=="Vendor")
          @if ($user->trade_licence != null)
          <li class="list-group-item">
            <b>Trade Licence: </b> <span class="text-right">  <a href="/file/users/trade_licence/{{ $user->trade_licence }}" target="_blank">{{ $user->trade_licence }}</a></span>
          </li>
          @endif
    
      @if ($user->tin_certificate != null)
      <li class="list-group-item">
        <b>TIN Certificate: </b> <span class="text-right"><a href="/file/users/tin_certificate/{{ $user->tin_certificate }}" target="_blank">{{ $user->tin_certificate }}</a></span>
      </li>
      @endif
    
      @if ($user->vat_certificate != null)
      <li class="list-group-item">
        <b>VAT Certificate: </b> <span class="text-right">  <a href="/file/users/vat_certificate/{{ $user->vat_certificate }}" target="_blank">{{ $user->vat_certificate }}</a></span>
      </li>
      @endif
      
      @if ($user->ci != null)
      <li class="list-group-item">
        <b>Certificate of Incorporation: </b> <span class="text-right"> <a href="/file/users/certificate_incorporation/{{ $user->ci }}" target="_blank">{{ $user->ci }}</a></span>
      </li>
      @endif
    @endif


    </ul>

    {{-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> --}}
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->
   


@if ($role_name=="Vendor")
<br>
                <div>
                  <a href="{{ route('users.edit',$user->id) }}" class="btn btn-info">Edit Profile</a>
                </div>
@endif
            </div>
</div>
</div>
</div>
</div>
</div>
</div>

@endsection