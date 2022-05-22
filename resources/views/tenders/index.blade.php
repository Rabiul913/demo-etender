@extends('layouts.app')


@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tenders</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/home">Home</a></li>
              <li class="breadcrumb-item active">Tenders</li>
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

            <div class="pull-right">
                @can('tender-create')
                <a class="btn btn-success" href="{{ route('tenders.create') }}"> Create New Tender</a>
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
      @if($role_name == 'Vendor')
        <tr>
            <th>No</th>
            <th>Subject</th>
            <th>Details</th>
            <th>Publish Date</th>
            <th>Deadline</th>
            <th>File</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($tenders as $tender)
        @if($tender->publish_date !=null)
        @php 
            $isProposalData=0; 
        @endphp
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $tender->subject }}</td>
            <td>{{ $tender->detail }}</td>
          <td>{{ $tender->publish_date }}</td>
          <td>{{ $tender->deadline }}</td>
          <td><a href="/file/tender/{{ $tender->file }}">{{ $tender->file }}</a></p>
          </td>
            <td>
                <form action="{{ route('tenders.destroy',$tender->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('tenders.show',$tender->id) }}">Show</a>
                    @can('tender-edit')
                    <a class="btn btn-primary" href="{{ route('tenders.edit',$tender->id) }}">Edit</a>
                    @endcan


                    @csrf
                    @method('DELETE')
                    @can('tender-delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    @endcan
                    @foreach($tender->Proposal as $proposal)
                        @if($proposal->user_id == Auth::user()->id)
                            @php 
                                $isProposalData=1; 
                            @endphp
                        @endif
                    @endforeach
                    @if((date("Y-m-d H:i:s") <= $tender->deadline) && empty($isProposalData))
                        <a class="btn btn-primary" href="{{ url('proposals/created',$tender->id) }}">Submit</a>
                    @endif
                </form>
            </td>
        </tr>
        @endif
        @endforeach
        @elseif ($role_name !="Vendor" )
        <tr>
            <th>No</th>
            <th>Subject</th>
            <th>Details</th>
            <th>Create Date</th>
            <th>Publish Date</th>
            <th>Deadline</th>
            <th>File</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($tenders as $tender)
            <td>{{ ++$i }}</td>
            <td>{{ $tender->subject }}</td>
            <td>{{ $tender->detail }}</td>
            <td>{{ $tender->create_date }}</td>
            <td>{{ $tender->publish_date }}</td>
            <td>{{ $tender->deadline }}</td>
          <td><a href="/file/tender/{{ $tender->file }}">{{ $tender->file }}</a></p>
          </td>
            <td>
                <form action="{{ route('tenders.destroy',$tender->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('tenders.show',$tender->id) }}">Show</a>
                    @can('tender-edit')
                    <a class="btn btn-primary" href="{{ route('tenders.edit',$tender->id) }}">Edit</a>
                    @endcan


                    @csrf
                    @method('DELETE')
                    @can('tender-delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    @endcan
                   <!--  @can('proposal-create')
                    @if(date("Y-m-d H:i:s")>$tender->deadline)
                    <a class="btn btn-primary" href="{{ route('tenders.edit',$tender->id) }}">Submit</a>
                    @endif
                    @endcan -->
                </form>
            </td>
        </tr>
        @endforeach
        @endif
    </table>

    {!! $tenders->links() !!}
</div>
</div>
</div>
</div>
</div>
@endsection