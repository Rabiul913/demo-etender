
@extends('layouts.app')


@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">
                Designations</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/home">Home</a></li>
              <li class="breadcrumb-item active">Designations</li>
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
            <div class="content-form">
        <div class="pull-right">
        @can('designation-create')
            <a class="btn btn-success" href="{{ route('designations.create') }}"> Create New Designation</a>
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
     <th>Name</th>
     <th>Status</th>
     <th width="280px">Action</th>
  </tr>
    @foreach ($designations as $key => $designation)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $designation->name }}</td>
    
            @if($designation->status == 0)
            <td> <label class="badge badge-info">Disable</label> </td>
             @elseif($designation->status == 1)
            <td> <label class="badge badge-info">Enable</label> </td>
            @endif
        
        <td>
            <a class="btn btn-info" href="{{ route('designations.show',$designation->id) }}">Show</a>
            @can('designation-edit')
                <a class="btn btn-primary" href="{{ route('designations.edit',$designation->id) }}">Edit</a>
            @endcan
            @can('designation-delete')
                {!! Form::open(['method' => 'DELETE','route' => ['designations.destroy', $designation->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
            @endcan
        </td>
    </tr>
    @endforeach
</table>


{!! $designations->render() !!}
</div>
</div>
</div>
</div>
</div>
</div>


@endsection