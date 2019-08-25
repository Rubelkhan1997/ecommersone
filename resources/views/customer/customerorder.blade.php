@extends('dashboard.admindashboard')

@section('dashboard_content')
  <div class="continer">
    <div class="row" style="padding-top:100px">
      <div class="col-md-6 ">
        <div class="card shadow">
          <div class="card-header text-center">
            <h2>Your Order</h2>
          </div>
          <div class="card-body text-center " style="padding-top:10px">
            <h3>{{ $sale }} {{ ($sale <= 1)? 'Order': str_plural('Order') }} </h3>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
