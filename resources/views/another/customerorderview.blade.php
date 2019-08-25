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
        <div class="alert alert-danger">
          <h4>{{ session('delete') }}</h4>
        </div>
      @endif
      @if (session('paid'))
        <div class="alert alert-success">
          <h4>{{ session('paid') }}</h4>
        </div>
      @endif
      <div class="card-body">
        <table class="table table-bordered">
          <tr>
            <th>SL No</th>
            <th>Customer Name</th>
            <th>Country Name</th>
            <th>City Name</th>
            <th>Zip Code</th>
            <th>Phone Number</th>
            <th>Address </th>
            <th>Grand Total </th>
            <th>Payment Type</th>
            <th>Payment Status</th>
            <th>Action</th>
          </tr>

          @forelse ($shippingaddress as $shippingaddres)
            @php
            $order_view = App\Order::where('shipping_id', $shippingaddres->id)->first()->order_view;
            $paid = App\Order::where('shipping_id', $shippingaddres->id)->first()->paid;
            $grand_total = App\Sale::where('shipping_id', $shippingaddres->id)->first()->grand_total;
            @endphp

                <tr class="{{ ($order_view == 1)? 'bg-success':'' }}">
                  <td>{{ $loop->index+1 }}</td>
                  <td>{{ $shippingaddres->first_name }} {{ $shippingaddres->last_name }}</td>
                  <td>{{ $shippingaddres->name }}</td>
                  <td>{{ App\City::find($shippingaddres->city_id)->name }}</td>
                  <td>{{ $shippingaddres->zip_code }}</td>
                  <td>{{ $shippingaddres->phone_number }}</td>
                  <td>{{ $shippingaddres->address }}</td>
                  <td>$ {{ $grand_total }}</td>
                  <td>{{ ($shippingaddres->payment_type == 1)? 'Cash On Dalivery':'Cradit Card' }}</td>
                  <td>{{ ($shippingaddres->payment_status == 1)? 'Not Yet':'Payment Successfully' }}</td>
                  <td>
                      <div>
                          <a class="btn btn-success" href="{{ url('order/view') }}/{{ $shippingaddres->id }}">Order View</a>
                      </div>
                      <div style="padding:5px 0">
                        @if ($paid == 1)
                        <a class="btn btn-primary"  href="{{ url('order/paid') }}/{{ $shippingaddres->id }}">Paid</a>
                        @endif
                      </div>
                      <div>
                        <a class="btn btn-danger" href="{{ url('order/delete') }}/{{ $shippingaddres->id }}">Delete</a>
                      </div>
                  </td>
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
        {{ $shippingaddress->links() }}
      </div>
    </div>
  </div>
  </div>
  </div>
@endsection
