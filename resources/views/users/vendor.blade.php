
@extends('layouts.app')


@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Vendors</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/home">Home</a></li>
              <li class="breadcrumb-item active">Vendors</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
<div class="content-form">
 

@if ($message = Session::get('success'))
<br>
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif

<br>
<table class="table table-bordered" style="table-layout: fixed;">
 <tr>
   <th width="10%">No</th>
   <th width="15%">Name</th>
   <th width="30%">Email</th>
   <th width="20%">Roles</th>
 </tr>
 @foreach ($data as $key => $vendor)
  <tr>
    
      <td>{{ ++$i }}</td>
      <td>{{ $vendor->name }}</td>
      <td style="word-wrap:break-word;">{{ $vendor->email }}</td>
      <td>
        @if(!empty($vendor->getRoleNames()))
          @foreach($vendor->getRoleNames() as $v)
            <label class="badge badge-success">{{ $v }}</label>
          @endforeach
        @endif
      </td>
  </tr>
 @endforeach
</table>


{!! $data->render() !!}
</div></div>
</div>
</div>
</div>
</div>

@endsection