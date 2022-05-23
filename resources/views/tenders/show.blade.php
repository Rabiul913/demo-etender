
@extends('layouts.app')


@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Show Tender</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/home">Home</a></li>
              <li class="breadcrumb-item active">Tender</li>
              <li class="breadcrumb-item active">Show Tender</li>
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
            <div class="content-form">
                  <div class="row">
                      <div class="col-xs-12 col-lg-6 col-md-12">
                          <div class="form-group">
                              <strong>Subject:</strong>
                             <div>
                              {{ $tender->subject }}
                             </div>
                          </div>
                      </div>
                      <div class="col-xs-12 col-lg-6 col-md-12">
                          <div class="form-group">
                              <strong>Details:</strong>
                              <div>
                                {{ $tender->detail }}
                              </div>
                            
                          </div>
                      </div>
                      <div class="col-xs-12 col-lg-6 col-md-12">
                          <div class="form-group">
                              <strong>Publish Date:</strong>
                              <div>
                                {{ $tender->publish_date }}
                              </div>
                            
                          </div>
                      </div>
                      <div class="col-xs-12 col-lg-6 col-md-12">
                          <div class="form-group">
                              <strong>Deadline:</strong>
                              <div>
                                {{ $tender->deadline }}
                              </div>
                          </div>
                      </div>
                      <div class="col-xs-12 col-sm-12 col-md-12">
                        <strong>File:</strong>
                          <div class="form-group">
                              
                              <iframe src="/file/tender/{{ $tender->file }}" height="700px" width="100%"></iframe>
                          </div>
                      </div>
                  </div>
              </div>
            </div>
 <div class="col-lg-12">
  <div class="content-form">

              @if($role_name == 'Vendor')

              @if($tender->publish_date !=null)
              @php 
              $isProposalData=0; 
              @endphp

              @foreach($tender->Proposal as $proposal)
                                      @if($proposal->user_id == Auth::user()->id)
                                          @php 
                                              $isProposalData=1; 
                                          @endphp
                                      @endif
              @endforeach
              @if((date("Y-m-d H:i:s") <= $tender->deadline) && empty($isProposalData))
              <div class="col-xs-12 col-sm-12 col-md-12 text-center my-3">
                <a class="btn btn-primary text-center" href="{{ url('proposals/created',$tender->id) }}">Submit</a>
              </div>
              @endif
              @endif
              @endif




              <table class="table table-bordered">
                @if($role_name != 'Vendor')
                <label for=""><h2>Proposal List</h2></label>
                      <tr>
                        <th>User ID</th>
                        <th>Tender Subject</th>
                        <th>Delivery Date</th>
                        <th>Total Amount</th>
                        <th>Offer Letter</th>
                    </tr>
                    @foreach ($tender->Proposal as $proposal)
                    {{-- @dd($proposal); --}}
                    <tr>
                      <td>{{ $proposal->user_id }}</td>
                      <td>{{ $proposal->tender_subject }}</td>
                      <td>{{ $proposal->delivery_date }}</td>
                      <td>{{ $proposal->total_amount }}</td>
                      <td><a href="/file/tender/proposal/{{ $proposal->file }}">{{ $proposal->file }}</a></p>
                      </td>
                  </tr>
                
                  @endforeach
                  @endif
                
              </table>

</div>
</div>
</div>
</div>
</div>
</div>

@endsection

