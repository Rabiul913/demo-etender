
@extends('layouts.app')


@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Proposals</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/home">Home</a></li>
              <li class="breadcrumb-item active">Proposals</li>
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

            {{-- <div class="pull-right">
                @can('proposal-create')
                <a class="btn btn-success" href="{{ route('proposals.create') }}"> Create New Proposal</a>
                @endcan
            </div> --}}
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
            <th>Tender Subject</th>
            <th>Delivery Duration</th>
            <th>Total Amount</th>
            <th>Offer Letter</th>
            <th width="280px">Action</th>
        </tr>
	    @foreach ($proposals as $proposal)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ $proposal->tender_subject }}</td>
          <td>{{ $proposal->delivery_date }}</td>
          <td>{{ $proposal->total_amount }}</td>
          <td><a href="/file/tender/proposal/{{ $proposal->file }}">{{ $proposal->file }}</a></p>
          </td>
	        <td>
                <form action="{{ route('proposals.destroy',$proposal->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('proposals.show',$proposal->id) }}">Show</a>
                    @can('proposal-edit')
                    <a class="btn btn-primary" href="{{ route('proposals.edit',$proposal->id) }}">Edit</a>
                    @endcan


                    @csrf
                    @method('DELETE')
                    @can('proposal-delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    @endcan
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>

    {!! $proposals->links() !!}
</div>
</div>
</div>
</div>
</div>
@endsection