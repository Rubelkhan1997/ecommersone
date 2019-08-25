@extends('dashboard.admindashboard')

@section('dashboard_content')
      <div class="col-md-10">
        <div class="breadcome-list shadow-reset">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                  <div class="breadcome-heading">
                    <form role="search" class="form-inline" action="{{ url('category/search') }}" method="post" id="button">
                      @csrf
                      <input type="text" placeholder="Category Name" class="form-control" name="category_name">
                      <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                  </div>
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
        <div class="col-md-10">
          <div class="card shadow">
            <div class="card-header text-center">
              <h2>Search Category List</h2>
            </div>
            @if (session('delete'))
              <div class="alert alert-success">
                <h4>{{ session('delete') }}</h4>
              </div>
            @endif
            <div class="card-body">
              <table class="table table-bordered">
                <tr>
                  <th>Category Name</th>
                  <th>Created At</th>
                  <th>Created At Ago</th>
                  <th>Action</th>

                </tr>
                @forelse ($category_searches as $category_searche)
                  <tr>
                    <td>{{ $category_searche->category_name }}</td>
                    <td>{{ $category_searche->created_at->format('d-m-Y h:i:s A') }}</td>
                    <td>{{ $category_searche->created_at->diffForHumans() }}</td>

                    <td id="button">
                      <a href="{{ url('category/edit') }}/{{ $category_searche->id }}" class="btn btn-success" style="margin-bottom:5px;">Edit</a>
                      <a href="{{ url('category/delete') }}/{{ $category_searche->id }}" class="btn btn-danger" style="margin-bottom:5px;">Delete</a>
                    </td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="4" class="text-center text-danger">
                      <div >
                        <h4>No Data Available</h4>
                      </div>
                    </td>
                  </tr>
                @endforelse
              </table>
            </div>
          </div>
        </div>
     </div>
  </div>

@endsection
