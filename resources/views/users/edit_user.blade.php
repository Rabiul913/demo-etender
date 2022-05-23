
@extends('layouts.app')


@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            {{-- <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/home">Home</a></li>
              <li class="breadcrumb-item active">User</li>
              <li class="breadcrumb-item active">Edit User</li>
            </ol> --}}
            <div class="pull-right">
                {{-- <a class="btn btn-primary btn-sm float-right" href="{{ route('users.pro') }}"> Back</a> --}}
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
@if (count($errors) > 0)
  <div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
       @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
       @endforeach
    </ul>
  </div>
@endif


{!! Form::model($user, ['method' => 'PATCH','id'=>'form','enctype'=>'multipart/form-data','route' => ['users.update', $user->id]]) !!}
<div class="row">
    <h4>General Information<span>*</span>:</h4>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong for='name'>Company Name<span>*</span>:</strong>
            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group">
          <strong for='designation'>Type<span>*</span>:</strong><br>
         @foreach ($tender_types as $type)
           <input type="radio" @if($user->type_id == $type->id) checked="true" @endif value="{{ $type->id }}" name="type_id"> {{ $type->name }}
         @endforeach
      </div>
  </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong for='email'>Email<span>*</span>:</strong>
            {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group">
          <strong for='phone'>Phone<span>*</span>:</strong>
          {!! Form::text('phone', null, array('placeholder' => 'Phone','class' => 'form-control')) !!}
      </div>
  </div>
  <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <strong for='contact_person_name'>Contact Person Name<span>*</span>:</strong>
        {!! Form::text('contact_person_name', null, array('placeholder' => 'Contact Person Name','class' => 'form-control')) !!}
    </div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <strong for='designation'>Designation<span>*</span>:</strong>
        <select name="designation" id="designation" class="form-control" multiple="multiple">
            @foreach ($designations as $key=>$designation)
                <option @if($user->designation == $designation) selected="true" @endif  value="{{ $designation }}"> {{ $designation }}</option>
            @endforeach
        </select>
    </div>
</div>
    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group">
          <strong for='address'>Address<span>*</span>:</strong>
          {!! Form::textarea('address', null, array('placeholder' => 'address','rows'=>'3','id'=>'address','class' => 'form-control')) !!}
      </div>
  </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <select name="roles[]" id="roles[]" class="form-control" multiple="multiple" hidden>
                @foreach ($roles as $key => $role)
                    <option @if($role=="Vendor") selected="true" @endif value="{{ $key }}"> {{ $role }}</option>
                @endforeach
            </select>
            {{-- {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control','multiple')) !!} --}}
        </div>
    </div>
    <h4>Legal Information<span>*</span>:</h4>
  <div class="row">
    <div class="col-xs-12 col-lg-6 col-md-12">
        <div class="form-group">
            <strong for='trade_licence'>Trade Licence (Up to Date)<span>*</span></strong>
            <div class="custom-file">
              <input type="file" class="custom-file-input"  name="trade_licence" id="trade_licence">
              <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-lg-6 col-md-12">
        <div class="form-group">
            <strong for='tin_certificate'>TIN Certificate (Up to Date)<span>*</span></strong>
            <div class="custom-file">
              <input type="file" class="custom-file-input" name="tin_certificate" id="tin_certificate">
              <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-lg-6 col-md-12">
        <div class="form-group">
            <strong for='vat_certificate'>VAT Certificate (Up to Date)<span>*</span></strong>
            <div class="custom-file">
              <input type="file" class="custom-file-input" name="vat_certificate" id="vat_certificate">
              <label class="custom-file-label" for="customFile" >Choose file</label>
            </div>
        </div>
    </div>

    <div class="col-xs-12 col-lg-6 col-md-12">
        <div class="form-group">
            <strong for='ci'>CI (If limited Company)</strong>
            <div class="custom-file">
              <input type="file" class="custom-file-input" name="ci" id="ci">
              <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
        </div>
    </div>

  </div>
  

    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <input type="submit" value="Submit" id="submit" name="submit" class="btn btn-primary"/>
        {{-- <input onclick="preview()" type="submit" class="btn btn-primary" name="preview" value="preview" > --}}
        {{-- <input type="submit" name="preview" id="preview" value="Preview" class="btn btn-primary"/> --}}
        {{-- <button type="submit" class="btn btn-primary" id="submit" name="submit">Submit</button> --}}
    </div>
</div>
{!! Form::close() !!}
</div>

<div id="preview_data" title="Preview Form Data" style="display:none;"></div>

</div>
</div>
</div>
</div>
</div>

@endsection




