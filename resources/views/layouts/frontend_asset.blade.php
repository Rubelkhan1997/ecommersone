  <!DOCTYPE html>
  <html lang="en">
  <head>
  <title>aStar</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="aStar Fashion Template Project">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/styles/bootstrap-4.1.3/bootstrap.css') }}">
  <link href="{{ asset('frontend_assets/plugins/font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet" >
  <link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/plugins/OwlCarousel2-2.2.1/owl.carousel.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/plugins/OwlCarousel2-2.2.1/animate.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/styles/main_styles.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/styles/responsive.css') }}">
    @yield('css_link');
  </head>
  <body>

	<div class="super_container" style="margin-top:-22px">

		<header class="header">
			<div class="header_content d-flex flex-row align-items-center justify-content-start">
				<div class="hamburger menu_mm"><i class="fa fa-bars menu_mm" aria-hidden="true"></i></div>
				<div class="header_logo">
					<a href="{{ url('') }}"><div>a<span>star</span></div></a>
				</div>
				<!-- Header Extra -->
        @php
            $ip_adderss = $_SERVER['REMOTE_ADDR'];
            $count = App\Addcart::where('ip_address',$ip_adderss)->count();
        @endphp
				<div class="header_extra ml-auto d-flex flex-row align-items-center justify-content-start">
					<div class="cart d-flex flex-row align-items-center justify-content-start">
						<div class="cart_icon"><a href="{{ url('cart') }}">
							<img src="{{ asset('frontend_assets/images/bag.png') }}" alt="">
              @if (App\Addcart::where('ip_address',$ip_adderss)->exists())
                <div class="cart_num">{{ $count }}</div>
                @else
                  <div class="cart_num">0</div>
              @endif
						</a></div>
					</div>
				</div>

			</div>
		</header>

    		<!-- Menu -->

    		<div class="menu d-flex flex-column align-items-start justify-content-start menu_mm trans_400">
    			<div class="menu_close_container"><div class="menu_close"><div></div><div></div></div></div>
    			<div class="menu_top d-flex flex-row align-items-center justify-content-start">

    			</div>
    			<div class="menu_search">
    				<form action="{{ url('products/search') }}" method="post" class="header_search_form menu_mm">
              @csrf
              <input type="search" class="search_input menu_mm" placeholder="Search" required="required">
    					<button class="header_search_button d-flex flex-column align-items-center justify-content-center menu_mm">
    						<i class="fa fa-search menu_mm" aria-hidden="true"></i>
    					</button>
    				</form>
    			</div>
          @php
            $categories = App\Category::all();
          @endphp
    			<nav class="menu_nav">
    				<ul class="menu_mm">
              <li class="menu_mm"><a href="{{ url('/') }}">Home</a></li>
              @foreach ($categories as $category)
                <li class="menu_mm"><a href="{{ url('category/page') }}/{{ $category->id }}">{{ $category->category_name }}</a></li>
              @endforeach
    				</ul>
    			</nav>
    			<div class="menu_extra">
    				<div class="menu_social">
    					<ul>
    						<li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
    						<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
    						<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
    						<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
    					</ul>
    				</div>
    			</div>
    		</div>

    		<!-- Sidebar -->
    		<div class="sidebar">

    			<div class="sidebar_logo">
    				<a href="{{ url('') }}"><div>a<span>star</span></div></a>
    			</div>

    			<!-- Sidebar Navigation -->
    			<nav class="sidebar_nav">
    				<ul>
              <li><a href="{{ url('/') }}">HOME<i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
              @foreach ($categories as $category)
                <li><a href="{{ url('category/page') }}/{{ $category->id }}">{{ $category->category_name }}<i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
              @endforeach
    				</ul>
    			</nav>

    			<!-- Search -->
    			<div class="search">
    				<form action="{{ url('products/search') }}" method="post" class="search_form" id="sidebar_search_form">
              @csrf
            	<input type="text" name="product_or_category_name" class="search_input" placeholder="Product Search" required="required">
    					<button class="search_button"><i class="fa fa-search" aria-hidden="true"></i></button>
    				</form>
    			</div>

    			<!-- Cart -->
    			<div class="cart d-flex flex-row align-items-center justify-content-start">
    				<div class="cart_icon"><a href="{{ url('cart') }}">
    					<img src="{{ asset('frontend_assets/images/bag.png') }}" alt="">
              @if (App\Addcart::where('ip_address',$ip_adderss)->exists())
                <div class="cart_num">{{ $count }}</div>
                @else
                  <div class="cart_num">0</div>
              @endif
    				</a></div>
    			</div>
    		</div>

    @yield('frontend_content')
    <!-- Footer -->

    <footer class="footer pt-5">
      <div class="footer_content">
        <div class="section_container">
          <div class="container">
            <div class="row">

              <!-- About -->
              <div class="col-xxl-3 col-md-6 footer_col">
                <div class="footer_about">
                  <!-- Logo -->
                  <div class="footer_logo">
                    <a href="#"><div>a<span>star</span></div></a>
                  </div>
                  <div class="footer_about_text">
                    <p>Donec vitae purus nunc. Morbi faucibus erat sit amet congue mattis. Nullam fringilla faucibus urna, id dapibus erat iaculis ut. Integer ac sem.</p>
                  </div>
                  <div class="cards">
                    <ul class="d-flex flex-row align-items-center justify-content-start">
                      <li><a href="#"><img src="{{ asset('frontend_assets/images/card_1.jpg') }}" alt="Not Found"></a></li>
                      <li><a href="#"><img src="{{ asset('frontend_assets/images/card_2.jpg') }}" alt="Not Found"></a></li>
                      <li><a href="#"><img src="{{ asset('frontend_assets/images/card_3.jpg') }}" alt="Not Found"></a></li>
                      <li><a href="#"><img src="{{ asset('frontend_assets/images/card_4.jpg') }}" alt="Not Found"></a></li>
                      <li><a href="#"><img src="{{ asset('frontend_assets/images/card_5.jpg') }}" alt="Not Found"></a></li>
                    </ul>
                  </div>
                </div>
              </div>

              <!-- Questions -->


              <!-- Contact -->
              <div class="col-xxl-3 col-md-6 footer_col">
                <div class="footer_contact">
                  <div class="footer_title">contact</div>
                  <div class="footer_contact_list">
                    <ul>
                      @php
                      $contacts = App\Contact::orderBy('id','desc')->get();
                      @endphp

                      @foreach ($contacts as $contact)
                        <li class="d-flex flex-row align-items-start justify-content-start"><span>C.</span><div>{{ $contact->company_name }}</div></li>
                        <li class="d-flex flex-row align-items-start justify-content-start"><span>A.</span><div>{{ $contact->company_address }}</div></li>
                        <li class="d-flex flex-row align-items-start justify-content-start"><span>T.</span><div>{{ $contact->phone_number }}</div></li>
                        <li class="d-flex flex-row align-items-start justify-content-start"><span>E.</span><div>{{ $contact->email_address }}</div></li>
                      @endforeach
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Social -->
      <div class="footer_social">
        <div class="section_container">
          <div class="container">
            <div class="row">
              <div class="col">
                <div class="footer_social_container d-flex flex-row align-items-center justify-content-between">
                  <!-- Instagram -->
                  <a href="#">
                    <div class="footer_social_item d-flex flex-row align-items-center justify-content-start">
                      <div class="footer_social_icon"><i class="fa fa-instagram" aria-hidden="true"></i></div>
                      <div class="footer_social_title">instagram</div>
                    </div>
                  </a>
                  <!-- Google + -->
                  <a href="#">
                    <div class="footer_social_item d-flex flex-row align-items-center justify-content-start">
                      <div class="footer_social_icon"><i class="fa fa-google-plus" aria-hidden="true"></i></div>
                      <div class="footer_social_title">google +</div>
                    </div>
                  </a>
                  <!-- Pinterest -->
                  <a href="#">
                    <div class="footer_social_item d-flex flex-row align-items-center justify-content-start">
                      <div class="footer_social_icon"><i class="fa fa-pinterest" aria-hidden="true"></i></div>
                      <div class="footer_social_title">pinterest</div>
                    </div>
                  </a>
                  <!-- Facebook -->
                  <a href="#">
                    <div class="footer_social_item d-flex flex-row align-items-center justify-content-start">
                      <div class="footer_social_icon"><i class="fa fa-facebook" aria-hidden="true"></i></div>
                      <div class="footer_social_title">facebook</div>
                    </div>
                  </a>
                  <!-- Twitter -->
                  <a href="#">
                    <div class="footer_social_item d-flex flex-row align-items-center justify-content-start">
                      <div class="footer_social_icon"><i class="fa fa-twitter" aria-hidden="true"></i></div>
                      <div class="footer_social_title">twitter</div>
                    </div>
                  </a>
                  <!-- YouTube -->
                  <a href="#">
                    <div class="footer_social_item d-flex flex-row align-items-center justify-content-start">
                      <div class="footer_social_icon"><i class="fa fa-youtube" aria-hidden="true"></i></div>
                      <div class="footer_social_title">youtube</div>
                    </div>
                  </a>
                  <!-- Tumblr -->
                  <a href="#">
                    <div class="footer_social_item d-flex flex-row align-items-center justify-content-start">
                      <div class="footer_social_icon"><i class="fa fa-tumblr-square" aria-hidden="true"></i></div>
                      <div class="footer_social_title">tumblr</div>
                    </div>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Credits -->
  		<div class="credits">
  			<div class="section_container">
  				<div class="container">
  					<div class="row">
  						<div class="col">
  							<div class="credits_content d-flex flex-row align-items-center justify-content-end">
  								<div class="credits_text"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                      Copyright &copy; All rights reserved | This template is made with
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></div>
    							</div>
    						</div>
    					</div>
    				</div>
    			</div>
    		</div>
    	</footer>

    </div>



  <script src="{{ asset('frontend_assets/js/jquery-3.2.1.min.js') }}"></script>
  <script src="{{ asset('frontend_assets/styles/bootstrap-4.1.3/popper.js') }}"></script>
  <script src="{{ asset('frontend_assets/styles/bootstrap-4.1.3/bootstrap.min.js') }}"></script>
  <script src="{{ asset('frontend_assets/plugins/greensock/TweenMax.min.js') }}"></script>
  <script src="{{ asset('frontend_assets/plugins/greensock/TimelineMax.min.js') }}"></script>
  <script src="{{ asset('frontend_assets/plugins/scrollmagic/ScrollMagic.min.js') }}"></script>
  <script src="{{ asset('frontend_assets/plugins/greensock/animation.gsap.min.js') }}"></script>
  <script src="{{ asset('frontend_assets/plugins/greensock/ScrollToPlugin.min.js') }}"></script>
  <script src="{{ asset('frontend_assets/plugins/OwlCarousel2-2.2.1/owl.carousel.js') }}"></script>
  <script src="{{ asset('frontend_assets/plugins/easing/easing.js') }}"></script>
  <script src="{{ asset('frontend_assets/plugins/parallax-js-master/parallax.min.js') }}"></script>
  <script src="{{ asset('frontend_assets/plugins/Isotope/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('frontend_assets/plugins/Isotope/fitcolumns.js') }}"></script>
  <script src="{{ asset('frontend_assets/js/custom.js') }}"></script>
  @yield('js_link')
  </body>
  </html>
