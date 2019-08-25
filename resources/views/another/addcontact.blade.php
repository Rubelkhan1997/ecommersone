@extends('dashboard.admindashboard')

@section('dashboard_content')
  <div class="col-md-10">
    <div class="breadcome-list shadow-reset">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">

        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
          <ul class="breadcome-menu">
            <li><a href="{{ url('admin/dashboard') }}">Dashboard</a> <span class="bread-slash">/</span>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>



  <div class="continer">
    <div class="row" style="padding-top:100px">
      <div class="col-md-12 ">
        <div class="card shadow">
          <div class="card-header text-center">
            <h2>Add Contact</h2>
          </div>
          @if (session('add'))
            <div class="alert alert-success">
              <h4>{{ session('add') }}</h4>
            </div>
          @endif
          <div class="card-body" style="padding-top:10px">
          <form class="" action="{{ url('add/contact/post') }}" method="post" >
              @csrf
              <div class="form-group col-md-6">
                <label><h4>Company Name</h4> </label>
                <input type="text" name="company_name" class="form-control" value="{{ old('company_name') }}">
                <span class="text-danger">{{ ($errors->has('company_name'))? $errors->first('company_name'):'' }} </span>
              </div>
              <div class="form-group col-md-6">
                <label><h4>Company Phone Number</h4> </label>
                <input type="text" name="phone_number" class="form-control" value="{{ old('phone_number') }}">
                <span class="text-danger">{{ ($errors->has('phone_number'))? $errors->first('phone_number'):'' }} </span>
              </div>
              <div class="form-group col-md-6">
                <label><h4>Company Email Address</h4> </label>
                <input type="text" name="email_address" class="form-control" value="{{ old('email_address') }}">
                <span class="text-danger">{{ ($errors->has('email_address'))? $errors->first('email_address'):'' }} </span>
              </div>
              <div class="form-group col-md-6">
                <label><h4>Company Address</h4> </label>
                <textarea name="company_address" class="form-control" rows="4">{{ old('company_address') }}</textarea>
                <span class="text-danger">{{ ($errors->has('company_address'))? $errors->first('company_address'):'' }} </span>
              </div>
              <button type="submit" class="btn btn-success btn-block"><h4>Add Contact</h4> </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
