@extends('layouts.frontend_asset')

@section('css_link')
  <link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/styles/checkout.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/styles/checkout_responsive.css') }}">
@endsection
@section('frontend_content')

  	<div class="home">
  		<div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="{{ url('frontend_assets/images/checkout.jpg') }}" data-speed="0.8"></div>
  		<div class="home_container">
  			<div class="home_content">
  				<div class="home_title">Checkout</div>
  				<div class="breadcrumbs">
  					<ul class="d-flex flex-row align-items-center justify-content-start">
  						<li><a href="{{ url('/') }}">Home</a></li>
  						<li><a href="{{ url('cart') }}">Your Cart</a></li>
  						<li>Checkout</li>
  					</ul>
  				</div>
  			</div>
  		</div>
  	</div>

  	<!-- Checkout -->

  	<div class="checkout">
  		<div class="section_container">
  			<div class="container">
  				<div class="row">
            @if (App\User::where('id', Auth::id())->exists())
                @if (App\Customerprofile::where('user_id', Auth::id())->exists())
                  <form action="{{ url('checkout/post') }}" method="post" id="checkout_form" class="checkout_form">
                   @csrf
                   <div class="col">
                      <div class="checkout_container d-flex flex-xxl-row flex-column align-items-start justify-content-start">
                                  <!-- Billing -->
                        <div class="billing checkout_box">
                            <div class="checkout_title">Billing Address</div>
                              <div class="checkout_form_container">
                                <div class="row">
                                  <div class="col-lg-6">
                                  <!-- Name -->
                                  <label for="checkout_name">First Name*</label>
                                  <input type="text" name="first_name" id="checkout_name" class="checkout_input" value="{{ $customerprofile->first_name }}" required>
                                </div>
                                <div class="col-lg-6">
                                <!-- Last Name -->
                                <label for="checkout_last_name">Last Name*</label>
                                <input type="text" name="last_name" id="checkout_last_name" class="checkout_input" value="{{ $customerprofile->last_name }}" required>
                              </div>
                            </div>

                            <div>
                            <!-- Country -->
                            <label for="checkout_country">Country*</label>
                            <select name="country_id" id="checkout_country" class="dropdown_item_select checkout_input" required>
                            <option  selected disabled  value="0" >-Select One-</option>
                            @foreach ($countries as $country)
                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                          @endforeach
                        </select>
                      </div>
                      <div>
                      <!-- Province -->
                      <label for="checkout_province">City/Town*</label>
                      <select name="city_id" id="checkout_province" class="dropdown_item_select checkout_input" required>
                      <option  value="0" selected disabled>-Select One-</option>
                    </select>
                    </div>
                    <div>
                    <!-- Zipcode -->
                    <label for="checkout_zipcode">Zipcode*</label>
                    <input type="text" id="checkout_zipcode"name="zip_code"  class="checkout_input"  required>
                    </div>
                    <div>
                    <!-- Phone no -->
                    <label for="checkout_phone">Phone no*</label>
                    <input type="phone" id="checkout_phone" name="phone_number" class="checkout_input" value="{{ $customerprofile->phone_number }}" >
                    </div>
                    <div>
                    <div>
                      <!-- Address -->
                      <label for="checkout_address">Address*</label>
                      <input type="text" id="checkout_address" name="address" class="checkout_input" value="{{ $customerprofile->address }}" >
                    </div>

                    <!-- Email -->
                    <label for="checkout_email">Email Address*</label>
                    <input type="phone" id="checkout_email" class="checkout_input" value="{{ Auth::user()->email }}" >

                    <input type="hidden" name="grand_total" value="{{ $grand_total }}">
                    </div>

                    </div>
                    </div>

                    <!-- Cart Total -->
                    <div class="cart_total">
                      <div class="cart_total_inner checkout_box">
                        <div class="checkout_title">Cart total</div>
                        <ul class="cart_extra_total_list">
                          <li class="d-flex flex-row align-items-center justify-content-start">
                            <div class="cart_extra_total_title">Total</div>
                            <div class="cart_extra_total_value ml-auto">${{ $grand_total }}</div>
                          </li>
                        </ul>

                        <!-- Payment Options -->
                        <div class="payment">
                          <div class="payment_options">
                            <label class="payment_option clearfix">Cach on delivery
                              <input type="radio" name="payment_type" checked value="1">
                              <span class="checkmark"></span>
                            </label>
                            <label class="payment_option clearfix">Credit card
                              <input type="radio" name="payment_type" value="2">
                              <span class="checkmark"></span>
                            </label>
                          </div>
                        </div>


                      </div>
                    </div>

                    </div>
                    </div>
                    <button type="submit" class="checkout_button trans_200">Place Order</button>
                    </form>
                  @else

                  @endif

              <form action="{{ url('checkout/post') }}" method="post" id="checkout_form" class="checkout_form">
                     @csrf
                    <div class="col">
                      <div class="checkout_container d-flex flex-xxl-row flex-column align-items-start justify-content-start">
                        <!-- Billing -->
                        <div class="billing checkout_box">
                        <div class="checkout_title">Billing Address</div>
                          <div class="checkout_form_container">
                              <div class="row">
                                <div class="col-lg-6">
                                  <!-- Name -->
                                  <label for="checkout_name">First Name*</label>
                                  <input type="text" name="first_name" id="checkout_name" class="checkout_input"  required>
                                </div>
                                <div class="col-lg-6">
                                  <!-- Last Name -->
                                  <label for="checkout_last_name">Last Name*</label>
                                  <input type="text" name="last_name" id="checkout_last_name" class="checkout_input"  required>
                                </div>
                              </div>

                              <div>
                                <!-- Country -->
                                <label for="checkout_country">Country*</label>
                                <select name="country_id" id="checkout_country" class="dropdown_item_select checkout_input" required>
                                  <option  selected disabled  value="0" >-Select One-</option>
                                  @foreach ($countries as $country)
                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                  @endforeach
                                </select>
                              </div>
                              <div>
                                <!-- Province -->
                                <label for="checkout_province">City/Town*</label>
                                <select name="city_id" id="checkout_province" class="dropdown_item_select checkout_input" required>
                                  <option  value="0" selected disabled>-Select One-</option>
                                </select>
                              </div>
                              <div>
                                <!-- Zipcode -->
                                <label for="checkout_zipcode">Zipcode*</label>
                                <input type="text" id="checkout_zipcode"name="zip_code"  class="checkout_input"  required>
                              </div>
                              <div>
                                <!-- Phone no -->
                                <label for="checkout_phone">Phone no*</label>
                                <input type="phone" id="checkout_phone" name="phone_number" class="checkout_input"  required>
                              </div>
                              <div>
                              <div>
                                <!-- Address -->
                                <label for="checkout_address">Address*</label>
                                <input type="text" id="checkout_address" name="address" class="checkout_input"  required>
                              </div>

                                <!-- Email -->
                                <label for="checkout_email">Email Address*</label>
                                <input type="phone" id="checkout_email" class="checkout_input" value="{{ Auth::user()->email }}" required>

                                <input type="hidden" name="grand_total" value="{{ $grand_total }}">
                              </div>

                          </div>
                        </div>

                        <!-- Cart Total -->
                        <div class="cart_total">
                          <div class="cart_total_inner checkout_box">
                            <div class="checkout_title">Cart total</div>
                            <ul class="cart_extra_total_list">
                              <li class="d-flex flex-row align-items-center justify-content-start">
                                <div class="cart_extra_total_title">Total</div>
                                <div class="cart_extra_total_value ml-auto">${{ $grand_total }}</div>
                              </li>
                            </ul>

                            <!-- Payment Options -->
                            <div class="payment">
                              <div class="payment_options">
                                <label class="payment_option clearfix">Cach on delivery
                                  <input type="radio" name="payment_type" checked value="1">
                                  <span class="checkmark"></span>
                                </label>
                                <label class="payment_option clearfix">Credit card
                                  <input type="radio" name="payment_type" value="2">
                                  <span class="checkmark"></span>
                                </label>
                              </div>
                            </div>


                          </div>
                        </div>

                      </div>
                    </div>
                    <button type="submit" class="checkout_button trans_200">Place Order</button>
              </form>


                @else
                    <div class="alert alert-danger">
                      <h3>Please <a href="{{ url('login') }}" >Login</a> Or <a href="{{ url('customer/register') }}" >Registation</a> First</h3>
                    </div>
                @endif
  				</div>
  			</div>
  		</div>
  	</div>

@endsection
@section('js_link')
  <script src="{{ url('frontend_assets/js/checkout.js') }}"></script>
  <script>
      $(document).ready(function(){
        $('#checkout_country').change(function(){
            var country_id = $('#checkout_country').val();

            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });
              $.ajax({
        			type:'POST',
        			url:'city/list',
        			data: {country_id:country_id},
        			success: function (data) {
    				     $('#checkout_province').html(data);
        			}
        		});
        });
      });
  </script>
@endsection
