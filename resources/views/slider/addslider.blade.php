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
            <h2>Add Slider</h2>
          </div>
          <div class="card-body" style="padding-top:10px">
            <form class="" action="{{ url('add/slider/post') }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="form-group col-md-6">
                <label><h4>Title One</h4> </label>
                <input type="text" name="title_one" class="form-control" value="{{ old('title_one') }}">
                <span class="text-danger">{{ ($errors->has('title_one'))? $errors->first('title_one'):'' }} </span>
              </div>
              <div class="form-group col-md-6">
                <label><h4>Title Two</h4> </label>
                <input type="text" name="title_two" class="form-control" value="{{ old('title_two') }}">
                <span class="text-danger">{{ ($errors->has('title_two'))? $errors->first('title_two'):'' }} </span>
              </div>
              <div class="form-group col-md-6">
                <label><h4>Title Three</h4> </label>
                <input type="text" name="title_three" class="form-control" value="{{ old('title_three') }}">
                <span class="text-danger">{{ ($errors->has('title_three'))? $errors->first('title_three'):'' }} </span>
              </div>
              <div class="form-group col-md-6">
                <label><h4>Slider Photos</h4> </label>
                <input type="file" name="slider_photo" class="form-control">
                <span class="text-danger">{{ ($errors->has('slider_photo'))? $errors->first('slider_photo'):'' }} </span>
              </div>
              <button type="submit" class="btn btn-success btn-block"><h4>Add Slider Info</h4> </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
