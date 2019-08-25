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
                      <li><a href="{{ url('customer/order/view') }}">Customer Order View</a> <span class="bread-slash">/</span>
                      </li>
                      <li><a href="{{ url('admin/dashboard') }}">Dashboard</a> <span class="bread-slash">/</span>
                      </li>
                  </ul>
              </div>
          </div>
      </div>
  </div>

  <div class="continer">
    <div class="row" style="padding-top:100px">
      <div class="col-md-12">
        <div class="card shadow">
          <div class="card-header text-center">
            <h2>Your Order Product</h2>
          </div>
          <div class="card-body " style="padding-top:10px">
            <table class="table table-bordered">
              <tr>
                <th>SL No</th>
                <th>Product Name</th>
                <th>Product Image</th>
                <th>Product Price</th>
                <th>Product Quantity</th>
              </tr>

              @forelse ($billingdetails as $billingdetail)
                    <tr>
                      <td>{{ $loop->index+1 }}</td>
                      <td>{{ $billingdetail->product_name }}</td>
                      <td>
                        @php
                        $prodct_image = App\Productimage::where('product_id', $billingdetail->product_id)->first();
                        @endphp
                        @if (App\Productimage::where('product_id', $billingdetail->product_id)->exists())
                          <img src="{{ asset('product/addproduct/'.$prodct_image->product_image) }}" alt="" width="100px">
                          @else
                            ---
                        @endif
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
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
