@extends('dashboard.admindashboard')

@section('dashboard_content')
  <div class="continer">
    <div class="row" style="padding-top:100px">
      <div class="col-md-12 ">
        <div class="card shadow">
          <div class="card-header text-center">
            <h2>Your Order View</h2>
          </div>
          <div class="card-body" style="padding-top:10px">
            <table class="table table-bordered">
              <tr>
                <th>Sale</th>
                <th>Grand Total</th>
                <th>Payment Type</th>
                <th>Payment Status</th>
                <th>Purchase Ago</th>
                <th>Purchase At</th>
                <th>Action</th>
              </tr>
              @foreach ($sales as $sale)
                <tr>
                  <td>{{ $loop->index+1 }}</td>
                  <td>{{ $sale->grand_total }}</td>
                  <td>{{ ($sale->payment_type == 1)? 'Case On Dalivary':'Credit Card' }}</td>
                  <td>{{ ($sale->payment_status == 1)? 'Not Yet':'Payment Successfully' }}</td>
                  <td>{{ $sale->created_at->diffForHumans() }}</td>
                  <td>{{ $sale->created_at->format('d-m-Y h:i:s') }}</td>
                  <td>
                    <div class="btn-group">
                      <a class="btn btn-success" href="{{ url('customer/product/view') }}/{{ $sale->id }}">Product View</a>
                    </div>
                  </td>
                </tr>
              @endforeach
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
