
@extends('layouts.app')


@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
          <!-- Content Header (Page header) -->
          <div class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1 class="m-0">Show Tender Proposal</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                  {{-- <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/home">Home</a></li>
                    <li class="breadcrumb-item active">Tender Proposal</li>
                    <li class="breadcrumb-item active">Show Tender Proposal</li>
                  </ol> --}}
                  <div class="pull-right">
                      <a class="btn btn-primary btn-sm float-right" href="{{ route('proposals.index') }}"> Back</a>
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


                          <h2>Proposal Details</h2>
                                  <div class="row">
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                          <div class="form-group">
                                              <strong>Tender Title:</strong>
                                              {{ $proposal->tender_subject }}
                                          </div>
                                      </div>
                                
                                      <div class="col-xs-12 col-lg-6 col-md-12">
                                        <div class="form-group">
                                            <strong>Tender Type:</strong>
                                            {{ $type->name}}
                                        </div>
                                      </div>
                                    
                                  
                                      <div class="col-xs-12 col-lg-6 col-md-12">
                                          <div class="form-group">
                                              <strong>Total Amount(including Vat & Tax):</strong>
                                              {{ $proposal->total_amount }}
                                          </div>
                                      </div>
                                      <div class="col-xs-12 col-lg-6 col-md-12">
                                          <div class="form-group">
                                              <strong>Delivery Date:</strong>
                                              {{ $proposal->delivery_date }}
                                          </div>
                                      </div><br>
                                
                                      
                                      <div class="row" style="padding-left: 6px">
                                            <h4 style="padding-left: 10px">Legal Information</h4>
                                            <div class="row" style="padding-left: 10px">
                                                    <div class="col-xs-12 col-lg-6 col-md-12">
                                                      <div class="form-group">
                                                          <strong>Trade Licence:</strong>
                                                          <a href="/file/users/trade_licence/{{ $user->trade_licence }}" target="_blank">tradelicence.pdf</a>
                                                      </div>
                                                    </div>
                                                    
                                              
                                                    <div class="col-xs-12 col-lg-6 col-md-12">
                                                        <div class="form-group">
                                                            <strong>TIN Certificate:</strong>
                                                            <a href="/file/users/tin_certificate/{{ $user->tin_certificate }}" target="_blank">tincertificate.pdf</a>
                                                        </div>
                                                    </div>

                                                    <div class="col-xs-12 col-lg-6 col-md-12">
                                                        <div class="form-group">
                                                            <strong>VAT Certificate:</strong>
                                                            <a href="/file/users/vat_certificate/{{ $user->vat_certificate }}" target="_blank">varcertificate.pdf</a>
                                                        </div>
                                                    </div>
                                              
                                                      @if ($user->ci != null)
                                                        <div class="col-xs-12 col-lg-6 col-md-12">
                                                            <div class="form-group">
                                                                <strong>Certificate of  Incorporation:</strong>
                                                                <a href="/file/users/certificate_incorporation/{{ $user->ci }}" target="_blank">certificateofincorporation.pdf</a>
                                                            </div>
                                                        </div>
                                                        
                                                      @endif


                                                           
                                                    <div class="col-xs-12 col-lg-6 col-md-12">
                                                      <div class="form-group">
                                                          <strong>  Bank Solvency:</strong>
                                                          <a href="/file/tender/proposal/banksolvency/{{ $proposal->bank_solvency }}" target="_blank">banksolvency.pdf</a>
                                                      </div>
                                                    </div>

                                                  <div class="col-xs-12 col-lg-6 col-md-12">
                                                      <div class="form-group">
                                                          <strong>Audit Report:</strong>
                                                          <a href="/file/tender/proposal/auditreport/{{ $proposal->audit_report }}" target="_blank">auditreport.pdf</a>
                                                      </div>
                                                  </div>

                                            </div>

        
                                           
                                      </div>

                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Offer Letter:</strong>
                                          <div class="form-group">
                                              
                                              <iframe src="/file/tender/proposal/{{ $proposal->file }}" height="700px" width="100%"></iframe>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
  </div>
@endsection

