@extends('layouts.frontend_asset')
@section('css_link')
  <link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/styles/product.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/styles/product_responsive.css') }}">
@endsection
@section('frontend_content')

  <div class="home">
		<div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="{{ asset('frontend_assets/images/product_background.jpg') }}" data-speed="0.8"></div>
		<div class="home_container">
			<div class="home_content">
				<div class="home_title">Shop</div>
				<div class="breadcrumbs">
					<ul class="d-flex flex-row align-items-center justify-content-start">
						<li><a href="{{ url('/') }}">Home</a></li>
						<li>{{ $single_product->product_name }}</li>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<!-- Products -->

	<div class="product" id="product">
		<!-- Product Content -->
		<div class="section_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="product_content_container d-flex flex-lg-row flex-column align-items-start justify-content-start">
							<div class="product_content order-lg-1 order-2 col-md-7" >
								<div class="product_content_inner" id="image">
                  @php
                   $product_images = App\Productimage::where('product_id',$single_product->id)->get();
                  @endphp
                  @foreach ($product_images as $product_image)
                    <div class="p-2">
                      <img src="{{ asset('product/addproduct/'.$product_image->product_image) }}" alt="" width="250px">
                    </div>

                @endforeach
              	</div>
							</div>
							<div class="product_sidebar order-lg-2 order-1 col-md-7">

									<div class="product_name">{{ $single_product->product_name }}</div>
									<div class="product_price">${{ $single_product->product_price }}</div>
									<div class="lead text-dark col-md-11">{{ $single_product->product_description }}</div>

                  @if (session('ince'))
                    <div class="alert alert-success mt-4">
                      <h4>{{ session('ince') }}</h4>
                    </div>
                  @endif
                  @if (session('add'))
                    <div class="alert alert-success mt-4">
                      <h4>{{ session('add') }}</h4>
                    </div>
                  @endif


                  @if ($single_product->product_quantity > 0)
                      <a class="btn btn-success btn-block mt-3" href="{{ url('add/cart') }}/{{ $single_product->id }}" class="cart_button trans_200">ADD TO CART</a>
                    @else

                    <div class="alert alert-danger mt-4">
                      <h4>Porduct Stock Out!</h4>
                    </div>
                  @endif


							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('js_link')
<script src="{{ asset('frontend_assets/js/product.js') }}"></script>
@endsection
