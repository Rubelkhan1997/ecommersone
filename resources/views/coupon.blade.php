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

  <div class="continer" >
    <div class="row">
      <div class="col-md-5">
        <div class="card shadow">
          <div class="card-header text-center">
            <h2>Add Coupon</h2>
          </div>
          @if (session('add'))
            <div class="alert alert-success">
              <h4>{{ session('add') }}</h4>
            </div>
          @endif
          <div class="card-body">
            <form class="" action="{{ url('add/coupon/post') }}" method="post" enctype="multipart/form-data">
              @csrf

              <div class="form-group">
                <label><h4>Coupon Name</h4> </label>
                <input type="text" name="coupon_name" class="form-control" value="{{ old('coupon_name') }}">
                <span class="text-danger">{{ ($errors->has('coupon_name'))? $errors->first('coupon_name'):'' }} </span>
              </div>
              <div class="form-group">
                <label><h4>Discount Amount</h4> </label>
                <input type="text" name="coupon_amount" class="form-control" value="{{ old('coupon_amount') }}">
                <span class="text-danger">{{ ($errors->has('coupon_amount'))? $errors->first('coupon_amount'):'' }} </span>
              </div>
              <div class="form-group">
                <label><h4>Valid Till(Date) </h4> </label>
                <input type="date" name="coupon_date" class="form-control" value="{{ old('coupon_date') }}">
                <span class="text-danger">{{ ($errors->has('coupon_date'))? $errors->first('coupon_date'):'' }} </span>
              </div>

              <button type="submit" class="btn btn-success btn-block"><h4>Add Coupon</h4> </button>
            </form>
          </div>
        </div>
      </div>

      <div class="col-md-7 ">
        <div class="card shadow">
          <div class="card-header text-center">
            <h2>Manage Coupon List</h2>
          </div>
          @if (session('delete'))
            <div class="alert alert-success">
              <h4>{{ session('delete') }}</h4>
            </div>
          @endif
          <div class="card-body">
            <table class="table table-bordered">
              <tr>
                <th>SL No</th>
                <th>Coupon Name</th>
                <th>Coupon Amount</th>
                <th>Coupon Date</th>
                <th>Status</th>
                <th>Action</th>
              </tr>

              @forelse ($coupons as $coupon)
                    <tr>
                      <td>{{ $loop->index+1 }}</td>

                      <td>{{ $coupon->coupon_name }}</td>
                      <td>{{ $coupon->coupon_amount }}</td>
                      <td>{{ $coupon->coupon_date }}</td>
                      <td>
                        @if ($coupon->coupon_date >= $coupon->created_at->format('Y-m-d'))
                          <div class="shadow bg-info text-center" style="padding:5px;font-size:16px">
                            Valid
                          </div>
                          @else
                            <div class="shadow bg-danger text-center" style="padding:5px;font-size:16px">
                              Invalid
                            </div>
                        @endif
                      </td>
                      <td>
                          <a href="{{ url('coupon/delete') }}/{{ $coupon->id }}" class="btn btn-danger" style="margin-bottom:5px;">Delete</a>
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
            {{ $coupons->links() }}
          </div>
        </div>
      </div>

    </div>
  </div>
@endsection
