@extends('dashboard.admindashboard')

@section('dashboard_content')
      <div class="col-md-10">
        <div class="breadcome-list shadow-reset">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                  <div class="breadcome-heading">
                    <form role="search" class="form-inline" action="{{ url('product/search') }}" method="post" id="button">
                      @csrf
                      <input type="text" placeholder="Product Name" class="form-control" name="product_name">
                      <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
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
            <h2>Manage Products List</h2>
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
                <th>Category Name</th>
                <th>Product Name</th>
                <th>Product Price</th>
                <th>Product Quantity</th>
                <th>Alert Quantity</th>
                <th>Product Description</th>
                <th>Product Photo</th>
                <th>Action</th>
              </tr>

              @forelse ($products as $product)

                    <tr>
                      <td>{{ $loop->index+1 }}</td>
                        <td>
                          @if (App\Category::where('id',$product->category_id)->exists())
                            {{ $product->categoryname->category_name }}
                          @else
                        @endif
                        </td>
                      <td>{{ $product->product_name }}</td>
                      <td>{{ $product->product_price }}</td>
                      <td>{{ $product->product_quantity }}</td>
                      <td>{{ $product->alert_quantity }}</td>
                      <td style="width:420px">{{ $product->product_description }}</td>
                      <td style="width:120px">
                        @if (App\Productimage::where('product_id',$product->id)->exists())
                          @php
                            $product_image = App\Productimage::where('product_id',$product->id)->first()->product_image;
                          @endphp
                          <img src="{{ asset('product/addproduct/'.$product_image) }}" alt="Not Found">
                          @else

                        @endif

                      </td>
                      <td id="button">
                          <a href="{{ url('product/edit') }}/{{ $product->id }}" class="btn btn-success" style="margin-bottom:5px;">Edit</a>
                          <a href="{{ url('product/delete') }}/{{ $product->id }}" class="btn btn-danger" style="margin-bottom:5px;">Delete</a>
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
            {{ $products->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
