<nav id="sidebar">
    <div class="sidebar-header">
      @if (App\Customerprofile::where('user_id', Auth::id())->exists())
        @php
        $customerprofile = App\Customerprofile::where('user_id', Auth::id())->first()->photo;
      @endphp
      <a href="#"><img src="{{ asset('customer_photo/'.$customerprofile) }}" alt="" />

    @else
        <a href="#"><img src="{{ asset('dashboard_assets/img/message/1.jpg') }}" alt="" />
      @endif
        </a>
        <h3>Andrar Son</h3>
        <p>Developer</p>
        <strong>AP+</strong>
    </div>
    <div class="left-custom-menu-adp-wrap">
        <ul class="nav navbar-nav left-sidebar-menu-pro">
          @if (Auth::user()->role == 1)
            <li class="nav-item">
              <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                <i class="fa big-icon fa-home"></i>
                <span class="mini-dn">Category Information</span>
                <span class="indicator-right-menu mini-dn"><i class="fa indicator-mn fa-angle-left"></i>  </span>
              </a>
              <div role="menu" class="dropdown-menu left-menu-dropdown animated flipInX">
                <a href="{{ url('add/category') }}" class="dropdown-item">Add Category</a>
                <a href="{{ url('manage/category') }}" class="dropdown-item">Manage Manage</a>
              </div>
            </li>
            <li class="nav-item">
              <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                <i class="fa big-icon fa-home"></i>
                <span class="mini-dn">Product Information</span>
                <span class="indicator-right-menu mini-dn"><i class="fa indicator-mn fa-angle-left"></i>  </span>
              </a>
              <div role="menu" class="dropdown-menu left-menu-dropdown animated flipInX">
                <a href="{{ url('add/product') }}" class="dropdown-item">Add Product</a>
                <a href="{{ url('manage/product') }}" class="dropdown-item">Manage Product</a>
              </div>
            </li>
            <li class="nav-item">
              <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                <i class="fa big-icon fa-home"></i>
                <span class="mini-dn">Coupon Information</span>
                <span class="indicator-right-menu mini-dn"><i class="fa indicator-mn fa-angle-left"></i>  </span>
              </a>
              <div role="menu" class="dropdown-menu left-menu-dropdown animated flipInX">
                <a href="{{ url('add/coupon') }}" class="dropdown-item">Add Coupon</a>
              </div>
            </li>
            <li class="nav-item">
              <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                <i class="fa big-icon fa-home"></i>
                <span class="mini-dn">Contact Information</span>
                <span class="indicator-right-menu mini-dn"><i class="fa indicator-mn fa-angle-left"></i>  </span>
              </a>
              <div role="menu" class="dropdown-menu left-menu-dropdown animated flipInX">
                <a href="{{ url('add/contact') }}" class="dropdown-item">Add Contact</a>
              </div>
            </li>
            @php
            $order_view =   App\Order::where('order_view', 1)->count();
            @endphp
            <li class="nav-item">
              <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                <i class="fa big-icon fa-home"></i>
                <span class="mini-dn">Customer Info </span> <span class="text-primary"> ({{ $order_view }}) </span>
                <span class="indicator-right-menu mini-dn"><i class="fa indicator-mn fa-angle-left"></i>  </span>
              </a>
              <div role="menu" class="dropdown-menu left-menu-dropdown animated flipInX">
                <a href="{{ url('admin/customer/order/view') }}" class="dropdown-item">Customer Order View</a>
              </div>
            </li>
            <li class="nav-item">
              <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                <i class="fa big-icon fa-home"></i>
                <span class="mini-dn">Slider Information</span>
                <span class="indicator-right-menu mini-dn"><i class="fa indicator-mn fa-angle-left"></i>  </span>
              </a>
              <div role="menu" class="dropdown-menu left-menu-dropdown animated flipInX">
                <a href="{{ url('add/slider') }}" class="dropdown-item">Add Slider</a>
              </div>
            </li>
            @else
              <li class="nav-item">
                <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                  <i class="fa big-icon fa-home"></i>
                  <span class="mini-dn">Visited Website </span>
                  <span class="indicator-right-menu mini-dn"><i class="fa indicator-mn fa-angle-left"></i>  </span>
                </a>
                <div role="menu" class="dropdown-menu left-menu-dropdown animated flipInX">
                  <a target="_blank" href="{{ url('vistied/website') }}" class="dropdown-item">Visited Website</a>
                </div>
              </li>
              <li class="nav-item">
                <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                  <i class="fa big-icon fa-home"></i>
                  <span class="mini-dn">Your Profile</span>
                  <span class="indicator-right-menu mini-dn"><i class="fa indicator-mn fa-angle-left"></i>  </span>
                </a>
                <div role="menu" class="dropdown-menu left-menu-dropdown animated flipInX">
                  <a href="{{ url('customer/profile') }}" class="dropdown-item">Add Profile</a>
                </div>
              </li>
              <li class="nav-item">
                <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                  <i class="fa big-icon fa-home"></i>
                  <span class="mini-dn">Your Order</span>
                  <span class="indicator-right-menu mini-dn"><i class="fa indicator-mn fa-angle-left"></i>  </span>
                </a>
                <div role="menu" class="dropdown-menu left-menu-dropdown animated flipInX">
                  <a href="{{ url('customer/order') }}" class="dropdown-item">Your Order</a>
                </div>
              </li>
              <li class="nav-item">
                <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                  <i class="fa big-icon fa-home"></i>
                  <span class="mini-dn">Your Order View</span>
                  <span class="indicator-right-menu mini-dn"><i class="fa indicator-mn fa-angle-left"></i>  </span>
                </a>
                <div role="menu" class="dropdown-menu left-menu-dropdown animated flipInX">
                  <a href="{{ url('customer/order/view') }}" class="dropdown-item">Your Order View</a>
                </div>
              </li>
          @endif
        </ul>
    </div>
</nav>
