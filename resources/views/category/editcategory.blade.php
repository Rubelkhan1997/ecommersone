@extends('dashboard.admindashboard')

  @section('dashboard_content')
    <div class="col-md-10">
      <div class="breadcome-list shadow-reset">
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">

          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <ul class="breadcome-menu">
              <li><a href="{{ url('manage/category') }}">Manage Category List</a> <span class="bread-slash">/</span>
              </li>
              <li><a href="{{ url('admin/dashboard') }}">Dashboard</a> <span class="bread-slash">/</span>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>


    <div class="row">
      <div class="col-md-7 " style="margin-left:50px;">
        <div class="card shadow">
          <div class="card-header text-center">
            <h2>Edit Category</h2>
          </div>
          @if (session('edit'))
            <div class="alert alert-success">
              <h4>{{ session('edit') }}</h4>
            </div>
          @endif
          <div class="card-body">
            <form class="" action="{{ url('category/edit/post') }}" method="post">
              @csrf
              <div class="form-group">
                <input type="hidden" name="category_id" class="form-control" value="{{ $category_info->id }}">
                <label><h4>Category Name</h4> </label>
                <input type="text" name="category_name" class="form-control" value="{{ $category_info->category_name }}">
              </div>
              <button type="submit" class="btn btn-success btn-block"><h4>Edit Category</h4> </button>
            </form>
          </div>
        </div>
      </div>

  @endsection
