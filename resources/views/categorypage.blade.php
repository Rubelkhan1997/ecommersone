@extends('layouts.frontend_asset')
@section('frontend_content')

  		<!-- Home -->
      <div class="home">

        <!-- Home Slider -->
        <div class="home_slider_container">
          <div class="owl-carousel owl-theme home_slider">
            @foreach ($sliders as $slider)
              <div class="owl-item">
              <div class="background_image" style="background-image:url({{ asset('slider/slider_photo/'.$slider->slider_photo) }})"></div>
              <div class="home_content_container">
                <div class="home_content">
                  <div class="home_discount d-flex flex-row align-items-end justify-content-start">
                    <div class="home_discount_num">{{ $slider->title_one }}</div>
                    <div class="home_discount_text">{{ $slider->title_two }}</div>
                  </div>
                  <div class="home_title" style="padding-top:10px">{{ $slider->title_three }}</div>
                  <div class="button button_1 home_button trans_200"><a href="{{ url('') }}">Shop NOW!</a></div>
                </div>
              </div>
            </div>
            @endforeach
          </div>

          <!-- Home Slider Navigation -->
          <div class="home_slider_nav home_slider_prev trans_200"><div class=" d-flex flex-column align-items-center justify-content-center"><img src="{{ asset('frontend_assets/images/prev.png') }}" alt=""></div></div>
          <div class="home_slider_nav home_slider_next trans_200"><div class=" d-flex flex-column align-items-center justify-content-center"><img src="{{ asset('frontend_assets/images/next.png') }}" alt=""></div></div>

        </div>
      </div>

  		<!-- Products -->

  		<div class="products" style="padding-bottom:100px" >
  			<div class="section_container">
  				<div class="container">
  					<div class="row " >
  						<div class="col-md-12" >
  							<div class="products_container grid">
  								@forelse ($products as $product)
  									<div class="product grid-item">
  									<div class="product_inner">
  										@if (App\Productimage::where('product_id',$product->id)->exists())
  											@php
  											 $product_image = App\Productimage::where('product_id',$product->id)->first()->product_image;
  											@endphp
  											<div class="product_image"><a href="{{ url('product/details') }}/{{ $product->id }}"><img src="{{ asset('product/addproduct/'.$product_image) }}" alt="Not Found"></a> </div>
  										@else

  										@endif
  										<div class="product_content text-center">
  											<div class="product_title"><a href="{{ url('product/details') }}/{{ $product->id }}">{{ $product->product_name }}</a></div>
  											<div class="product_price">${{ $product->product_price }}</div>
                        @if ($product->product_quantity > 0)
  											<div class="product_button ml-auto mr-auto trans_200"><a href="{{ url('add/cart') }}/{{ $product->id }}">add to cart</a></div>
                        @else
                          <div class="alert alert-success mt-3">
                            Product Stock Out!
                          </div>
                      @endif
  										</div>
  									</div>
  								</div>
                @empty
                  <div class="alert alert-danger">
                    No Porduct Available
                  </div>
                @endforelse
  							</div>
  						</div>
  					</div>
  				</div>
  			</div>
  		</div>

  		<!-- Newsletter -->




@endsection
