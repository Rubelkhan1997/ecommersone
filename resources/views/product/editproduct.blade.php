@extends('dashboard.admindashboard')

@section('dashboard_content')
  <div class="col-md-10">
    <div class="breadcome-list shadow-reset">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">

        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
          <ul class="breadcome-menu">
            <li><a href="{{ url('manage/product') }}">Manage Products List</a> <span class="bread-slash">/</span>
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
          <div class="col-md-10 ">
            <div class="card shadow">
              <div class="card-header text-center">
                <h2>Edit Product</h2>
              </div>
              @if (session('update'))
                <div class="alert alert-success">
                  <h4>{{ session('update') }}</h4>
                </div>
              @endif
              <div class="card-body">
                <form name="productedit" action="{{ url('product/edit/post') }}" method="post" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" name="product_id" class="form-control" value="{{ $product->id }}">
                  <div class="form-group col-md-6">
                    <label><h4>Category Name</h4> </label>
                    <select class="form-control" name="category_id">
                      <option value="0">-Select One-</option>
                      @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group col-md-6">
                    <label><h4>Product Name</h4> </label>
                    <input type="text" name="product_name" class="form-control" value="{{ $product->product_name }}">
                  </div>
                  <div class="form-group col-md-6">
                    <label><h4>Product Price</h4> </label>
                    <input type="text" name="product_price" class="form-control" value="{{ $product->product_price }}">
                  </div>
                  <div class="form-group col-md-6">
                    <label><h4>Product Quantity</h4> </label>
                    <input type="text" name="product_quantity" class="form-control" value="{{ $product->product_quantity }}">
                  </div>
                  <div class="form-group col-md-6">
                    <label><h4>Alert Quantity</h4> </label>
                    <input type="text" name="alert_quantity" class="form-control" value="{{ $product->alert_quantity }}">
                  </div>
                  <div class="form-group col-md-6">
                    <label><h4>Product Photos</h4> </label>
                    <input type="file" name="product_image[]" class="form-control" multiple>
                  </div>
                  <div class="form-group col-md-12">
                    <label><h4>Product Description</h4> </label>
                    <textarea name="product_description" rows="6" class="form-control" >{{ $product->product_description }}</textarea>
                  </div>

                  <button type="submit" class="btn btn-success btn-block"><h4>Edit Product</h4> </button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <script>
        document.forms['productedit'].elements['category_id'].value={{ $product->category_id }}
      </script>
@endsection
