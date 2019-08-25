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

  <div class="continer">
    <div class="row">
      <div class="col-md-10 ">
        <div class="card shadow">
          <div class="card-header text-center">
            <h2>Add Product</h2>
          </div>
            @if (session('add'))
              <div class="alert alert-success">
                <h4>{{ session('add') }}</h4>
              </div>
            @endif
            <div class="card-body">
              <form class="" action="{{ url('add/product/post') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group col-md-6">
                  <label><h4>Category Name</h4> </label>
                    <select class="form-control" name="category_id">
                      <option value="0">-Select One-</option>
                      @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                      @endforeach
                  </select>
                  <span class="text-danger">{{ ($errors->has('category_id'))? $errors->first('category_id'):'' }} </span>
                </div>
                <div class="form-group col-md-6">
                  <label><h4>Product Name</h4> </label>
                  <input type="text" name="product_name" class="form-control" value="{{ old('product_name') }}">
                  <span class="text-danger">{{ ($errors->has('product_name'))? $errors->first('product_name'):'' }} </span>
                </div>
                <div class="form-group col-md-6">
                  <label><h4>Product Price</h4> </label>
                  <input type="text" name="product_price" class="form-control" value="{{ old('product_price') }}">
                  <span class="text-danger">{{ ($errors->has('product_price'))? $errors->first('product_price'):'' }} </span>
                </div>
                <div class="form-group col-md-6">
                  <label><h4>Product Quantity</h4> </label>
                  <input type="text" name="product_quantity" class="form-control" value="{{ old('product_quantity') }}">
                  <span class="text-danger">{{ ($errors->has('product_quantity'))? $errors->first('product_quantity'):'' }} </span>
                </div>
                <div class="form-group col-md-6">
                  <label><h4>Alert Quantity</h4> </label>
                  <input type="text" name="alert_quantity" class="form-control" value="{{ old('alert_quantity') }}">
                  <span class="text-danger">{{ ($errors->has('alert_quantity'))? $errors->first('alert_quantity'):'' }} </span>
                </div>
                <div class="form-group col-md-6">
                  <label><h4>Product Photos</h4> </label>
                  <input type="file" name="product_image[]" class="form-control" multiple>
                  <span class="text-danger">{{ ($errors->has('product_image'))? $errors->first('product_image'):'' }} </span>
                </div>

                <div class="form-group col-md-12">
                  <label><h4>Product Description</h4> </label>
                  <textarea name="product_description" rows="6" class="form-control" >{{ old('product_description') }}</textarea>
                  <span class="text-danger">{{ ($errors->has('product_description'))? $errors->first('product_description'):'' }} </span>
                </div>

                <button type="submit" class="btn btn-success btn-block"><h4>Add Product</h4> </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
