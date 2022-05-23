
@extends('layouts.app')


@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">
                Tender Types</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/home">Home</a></li>
              <li class="breadcrumb-item active">Tender Types</li>
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
        @can('tender_type-create')
            <a class="btn btn-success" href="{{ route('tender_types.create') }}"> Create New Tender Type</a>
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
    @foreach ($tender_types as $key => $tender_type)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $tender_type->name }}</td>
    
            @if($tender_type->status == 0)
            <td> <label class="badge badge-danger">Disable</label> </td>
             @elseif($tender_type->status == 1)
            <td> <label class="badge badge-info">Enable</label> </td>
            @endif
        
        <td>
            <a class="btn btn-info" href="{{ route('tender_types.show',$tender_type->id) }}">Show</a>
            @can('tender_type-edit')
                <a class="btn btn-primary" href="{{ route('tender_types.edit',$tender_type->id) }}">Edit</a>
            @endcan
            @can('tender_type-delete')
                {!! Form::open(['method' => 'DELETE','route' => ['tender_types.destroy', $tender_type->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
            @endcan
        </td>
    </tr>
    @endforeach
</table>


{!! $tender_types->render() !!}
</div>
</div>
</div>
</div>
</div>
</div>


@endsection