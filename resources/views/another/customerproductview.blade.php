@extends('dashboard.admindashboard')

@section('dashboard_content')
  <div class="col-md-10">
    <div class="breadcome-list shadow-reset">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
              <div class="breadcome-heading">

              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <ul class="breadcome-menu">
                    <li><a href="{{ url('admin/customer/order/view') }}">Customer Order View</a> <span class="bread-slash">/</span>
                    </li>
                    <li><a href="{{ url('admin/dashboard') }}">Dashboard</a> <span class="bread-slash">/</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
  </div>

  <div class="continer">
  <div class="row">
  <div class="col-md-12 ">
    <div class="card shadow">
      <div class="card-header text-center">
        <h2>Customer Order List</h2>
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
            <th>Product Name</th>
            <th>Product Photo</th>
            <th>Product Price</th>
            <th>Product Quantity</th>
          </tr>

          @forelse ($billingdetails as $billingdetail)
            @php
                $product_image = App\Productimage::where('product_id',$billingdetail->product_id)->first()->product_image;
            @endphp
                <tr>
                  <td>{{ $loop->index+1 }}</td>
                  <td>{{ $billingdetail->product_name }}</td>
                  <td>
                    <img src="{{ asset('product/addproduct/'.$product_image) }}" alt="Not Found" width="100px">
                  </td>
                  <td>{{ $billingdetail->product_price }}</td>
                  <td>{{ $billingdetail->product_quantity }}</td>
                </tr>
            @empty
              <tr>
                <td colspan="9" class="text-center text-danger">
                  <div >
                    <h4>No Data Available</h4>
                  </div>
                </td>
              </tr>
          @endforelse
          {{-- <tr class="">
            <td colspan="5">
              <a class="btn btn-success" href="{{ url('order/view') }}/{{ $billingdetail->id }}">Generate Invoice</a>
            </td>
          </tr> --}}
        </table>
      </div>
    </div>
  </div>
  </div>
  </div>
@endsection
