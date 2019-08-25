@extends('layouts.frontend_asset')
@section('css_link')
  <link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/styles/cart.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/styles/cart_responsive.css') }}">
@endsection
@section('frontend_content')
  <div class="home">
    <div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="{{ asset('frontend_assets/images/product_background.jpg') }}" data-speed="0.8"></div>
    <div class="home_container">
      <div class="home_content">
        <div class="home_title">Cart</div>
        <div class="breadcrumbs">
          <ul class="d-flex flex-row align-items-center justify-content-start">
            <li><a href="{{ url('/') }}">Home</a></li>
            <li>Your Cart</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="cart_section">
		<div class="section_container">
			<div class="container">
				<div class="row">
					<div class="col">
            <form  action="{{ url('cart/update') }}" method="post">
						<div class="cart_container">
                @csrf
							<!-- Cart Bar -->
              @if (session('success_cod'))
                <div class="alert alert-success">
                  {{ session('success_cod') }}
                </div>
              @endif
              @if (session('success'))
                <div class="alert alert-success">
                  {{ session('success') }}
                </div>
              @endif
              @if (session('singledelete'))
                <div class="alert alert-danger">
                  {{ session('singledelete') }}
                </div>
              @endif
              @if (session('cartdelete'))
                <div class="alert alert-danger">
                  {{ session('cartdelete') }}
                </div>
              @endif
              @if (session('update'))
                <div class="alert alert-success">
                  {{ session('update') }}
                </div>
              @endif
              @if (session('noupdate'))
                <div class="alert alert-danger">
                  {{ session('noupdate') }}
                </div>
              @endif
							<div class="cart_bar">
								<ul class="cart_bar_list item_list d-flex flex-row align-items-center justify-content-start">
									<li>Product Image</li>
									<li>Product Name</li>
									<li>Price</li>
									<li>Quantity</li>
									<li>Total</li>
									<li>Delete</li>
								</ul>
							</div>

							<!-- Cart Items -->
							<div class="cart_items mt-2">
								<ul class="cart_items_list">
                  @php
                    $sub_total = 0;
                  @endphp
                  @forelse ($cart_items as $cart_item)
                    @php
                      $product_image = App\Productimage::where('product_id',$cart_item->product_id)->first()->product_image;
                    @endphp
                  <li class="cart_item item_list d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start">
										<div class="product d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start">
											<div><div class="product_image"><img src="{{ asset('product/addproduct/'.$product_image) }}" alt=""></div></div>
										</div>
										<div class="product_price text-lg-center product_text">{{ $cart_item->product_name }}</div>
										<div class="product_price text-lg-center product_text"><span>Price: </span>${{ $cart_item->product_price }}</div>
										<div class="product_quantity_container">
	                        <input type="hidden" name="product_id[]" class="btn" value="{{ $cart_item->product_id	 }}" style="width:100px;" min="1">
	                        <input type="number" name="product_quantity[]" class="btn" value="{{ $cart_item->product_quantity	 }}" style="width:100px;" min="1">

										</div>
										<div class="product_total text-lg-center product_text"><span>Total: </span>$
                      {{  $cart_item->product_price*$cart_item->product_quantity }}
                      @php
                        $sub_total = $sub_total + $cart_item->product_price*$cart_item->product_quantity;
                      @endphp
                    </div>
                    <a href="{{ url('single/product/delete') }}/{{ $cart_item->id }}" class="text-lg-center" style="font-size:25px"><span class="fa fa-trash"> </span></a>

									</li>
                  @empty
                    <li >
                      <div class="text-lg-center bg-danger text-light p-1"><h3>Item Not Yet</h3> </div>
                    </li>
                @endforelse
									<!-- Cart Item -->
								</ul>
							</div>

							<!-- Cart Buttons -->
							<div class="cart_buttons d-flex flex-row align-items-start justify-content-start">
								<div class="cart_buttons_inner ml-auto d-flex flex-row align-items-start justify-content-start flex-wrap">
									<div class="button button_continue trans_200"><a href="{{ url('/') }}">continue shopping</a></div>
									<div class="button button_clear trans_200"><a href="{{ url('cart/item/delete') }}">clear cart</a></div>
									<button type="submit" class="button button_update " style="width:200px">update cart</button>
								</div>
							</div>
						</div>
          </form>
					</div>
				</div>
			</div>
		</div>

		<div class="mt-5 ">
			<div class="container">
				<div class="row">

					<!-- Shipping & Delivery -->
          <div class="col-xxl-6 col-md-6 mt-5 ">
            @if (session('invalid'))
              <div class="alert alert-danger">
                {{ session('invalid') }}
              </div>
            @endif
            @if (session('no'))
              <div class="alert alert-danger">
                {{ session('no') }}
              </div>
            @endif
						<div class="cart_extra cart_extra_1">
							<div class="cart_extra_content cart_extra_coupon">
								<div class="cart_extra_title">Coupon code</div>
								<div class="coupon_form_container">
										<input type="text" class="coupon_input" id="input1" value="{{ $coupon_name }}">
										<button class="coupon_button" id="button1">apply code</button>
								</div>
								<div class="shipping">
									<div class="cart_extra_title">Shipping Method</div>
									<ul>
										<li class="shipping_option d-flex flex-row align-items-center justify-content-start">
											<label class="radio_container">
												<input type="radio" id="radio_1" name="shipping_radio" class="shipping_radio">
												<span class="radio_mark"></span>
												<span class="radio_text" id="next_day">Next day delivery</span>
											</label>
											<div class="shipping_price ml-auto">$4.99</div>
										</li>
										<li class="shipping_option d-flex flex-row align-items-center justify-content-start">
											<label class="radio_container">
												<input type="radio" id="radio_2" name="shipping_radio" class="shipping_radio">
												<span class="radio_mark"></span>
												<span class="radio_text" id="standard_day">Standard delivery</span>
											</label>
											<div class="shipping_price ml-auto">$1.99</div>
										</li>
										<li class="shipping_option d-flex flex-row align-items-center justify-content-start">
											<label class="radio_container">
												<input type="radio" id="radio_3" name="shipping_radio" class="shipping_radio" checked>
												<span class="radio_mark"></span>
												<span class="radio_text" id="personal">Personal Pickup</span>
											</label>
											<div class="shipping_price ml-auto">Free</div>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>

					<!-- Cart Total -->
					<div class="col-xxl-6 col-md-6 mt-5">
						<div class="cart_extra cart_extra_2">
							<div class="cart_extra_content cart_extra_total">
								<div class="cart_extra_title">Cart Total</div>
								<ul class="cart_extra_total_list">
									<li class="d-flex flex-row align-items-center justify-content-start">
										<div class="cart_extra_total_title">Subtotal</div>
										<div class="cart_extra_total_value ml-auto">${{ $sub_total }}</div>
									</li>
									<li class="d-flex flex-row align-items-center justify-content-start">
										<div class="cart_extra_total_title">Discount Amount</div>
										<div class="cart_extra_total_value ml-auto">${{ $coupon_amount }}</div>
									</li>
                  @php
                    $parsentis = $sub_total*($coupon_amount/100);
                    $discount_total = $sub_total - $parsentis;
                  @endphp
									<li class="d-flex flex-row align-items-center justify-content-start">
										<div class="cart_extra_total_title" >Shipping</div>
										<div class="cart_extra_total_value ml-auto" id="shipping">Free</div>
									</li>
									<li class="d-flex flex-row align-items-center justify-content-start">
										<div class="cart_extra_total_title">Total</div>
									  <div style="display:none;"class="cart_extra_total_value ml-auto" ><span>$</span> <span id="discount_total">{{ $discount_total }}</span>	</div>
									  <div class="cart_extra_total_value ml-auto" ><span>$</span> <span id="dalivery_charge_total">{{ $discount_total }}</span>	</div>
									</li>
								</ul>
                <form action="{{ url('checkout') }}" method="post">
                  @csrf
                  <input type="hidden" name="grand_total" id="grand_total" value="{{ $discount_total }}">
                  <button type="submit" class="checkout_button trans_200 btn-block">Proceed to Checkout</button>
                </form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
@section('js_link')
<script src="{{ asset('frontend_assets/js/cart.js') }}"></script>
  <script>
      $(document).ready(function(){
        $('#button1').click(function(){
          var coupon_name = $('#input1').val();
          window.location.href = "{{ url('cart') }}" + "/" + coupon_name;
        });
        $('#next_day').click(function(){
          var next_day = parseFloat(4.99);
          $('#shipping').html(next_day);
          var discount_total = parseFloat($('#discount_total').html());
          var total_amount = next_day + discount_total;
          $('#dalivery_charge_total').html(parseFloat(total_amount).toFixed(2));
          $('#grand_total').val(parseFloat(total_amount).toFixed(2));

        });
        $('#standard_day').click(function(){
          var standard_day = parseFloat(1.99);
          $('#shipping').html(standard_day);
          var discount_total = parseFloat($('#discount_total').html());
          var total_amount = standard_day + discount_total;
          $('#dalivery_charge_total').html(parseFloat(total_amount).toFixed(2));
          $('#grand_total').val(parseFloat(total_amount).toFixed(2));

        });
        $('#personal').click(function(){
          var personal = parseFloat(0);
          $('#shipping').html(personal);
          var discount_total = parseFloat($('#discount_total').html());
          var total_amount = personal + discount_total;
          $('#dalivery_charge_total').html(parseFloat(total_amount).toFixed(2));
          $('#grand_total').val(parseFloat(total_amount).toFixed(2));

        });

      });
  </script>

@endsection
