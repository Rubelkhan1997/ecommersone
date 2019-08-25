<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Admin Dashboard</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('dashboard_assets/img/favicon.ico') }} ">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i,800" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('dashboard_assets/css/bootstrap.min.css') }}">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('dashboard_assets/css/font-awesome.min.css') }}">
    <!-- adminpro icon CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('dashboard_assets/css/adminpro-custon-icon.css') }}">
    <!-- meanmenu icon CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('dashboard_assets/css/meanmenu.min.css') }}">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('dashboard_assets/css/jquery.mCustomScrollbar.min.css') }}">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('dashboard_assets/css/animate.css') }}">

    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('dashboard_assets/style.css') }}">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('dashboard_assets/css/responsive.css') }}">
    <!-- modernizr JS
		============================================ -->
    <script src="{{ asset('dashboard_assets/js/modernizr-2.8.3.min.js') }}"></script>


    {{-- My Style --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_assets/style2.css') }}">
</head>

<body class="materialdesign">


    <!-- Header top area start-->
    <div class="wrapper-pro">
        <div class="left-sidebar-pro">

           <!-- ................................................... -->
        @include('dashboard.dashboardmenu')
        </div>
        <div class="content-inner-all">
            @include('dashboard.dashboardheader')
            <!-- Header top area end-->

            <!-- Mobile Menu start -->
<!-- .......................................................................................... -->
            <div class="mobile-menu-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="mobile-menu">
                                <nav id="dropdown">
                                    <ul class="mobile-menu-nav">
                                        <li><a data-toggle="collapse" data-target="#Charts" href="#">Home <span class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a>
                                            <ul class="collapse dropdown-header-top">
                                                <li><a href="dashboard.html">Dashboard v.1</a>
                                                </li>
                                                <li><a href="dashboard-2.html">Dashboard v.2</a>
                                                </li>
                                                <li><a href="analytics.html">Analytics</a>
                                                </li>
                                                <li><a href="widgets.html">Widgets</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#demo" href="#">Mailbox <span class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a>
                                            <ul id="demo" class="collapse dropdown-header-top">
                                                <li><a href="inbox.html">Inbox</a>
                                                </li>
                                                <li><a href="view-mail.html">View Mail</a>
                                                </li>
                                                <li><a href="compose-mail.html">Compose Mail</a>
                                                </li>
                                            </ul>
                                        </li>

                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mobile Menu end -->

<!-- ................................................................................ -->
            <div class="stockprice-feed-project-area">
                <div class="container-fluid">

                    @yield('dashboard_content')

                </div>
            </div>
            <!-- stockprice, feed area end-->

        </div>
    </div>
    <!-- Footer Start-->
    {{-- <div class="footer-copyright-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer-copy-right">
                        <p>Copyright &#169; 2018 Colorlib All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                    </div>
                </div>
            </div>
        </div>
      </div> --}}
    <!-- Footer End-->
    <!-- Chat Box Start-->
    <div class="chat-list-wrap">
        <div class="chat-list-adminpro">
            <div class="chat-button">
                <span data-toggle="collapse" data-target="#chat" class="chat-icon-link"><i class="fa fa-comments"></i></span>
            </div>
            <div id="chat" class="collapse chat-box-wrap shadow-reset animated zoomInLeft">
                <div class="chat-main-list">
                    <div class="chat-heading">
                        <h2>Messanger</h2>
                    </div>
                    <div class="chat-content chat-scrollbar">
                        <div class="author-chat">
                            <h3>Monica <span class="chat-date">10:15 am</span></h3>
                            <p>Hi, what you are doing and where are you gay?</p>
                        </div>
                        <div class="client-chat">
                            <h3>Mamun <span class="chat-date">10:10 am</span></h3>
                            <p>Now working in graphic design with coding and you?</p>
                        </div>
                        <div class="author-chat">
                            <h3>Monica <span class="chat-date">10:05 am</span></h3>
                            <p>Practice in programming</p>
                        </div>
                        <div class="client-chat">
                            <h3>Mamun <span class="chat-date">10:02 am</span></h3>
                            <p>That's good man! carry on...</p>
                        </div>
                    </div>
                    <div class="chat-send">
                        <input type="text" placeholder="Type..." />
                        <span><button type="submit">Send</button></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Chat Box End-->
    <!-- jquery
		============================================ -->
    <script src="{{ asset('dashboard_assets/js/jquery-1.11.3.min.js') }} "></script>

    <!-- bootstrap JS
		============================================ -->
    <script src="{{ asset('dashboard_assets/js/bootstrap.min.js') }} "></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="{{ asset('dashboard_assets/js/jquery.meanmenu.js') }} "></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="{{ asset('dashboard_assets/js/jquery.mCustomScrollbar.concat.min.js') }} "></script>
    <!-- sticky JS
		============================================ -->
    <script src="{{ asset('dashboard_assets/js/jquery.sticky.js') }} "></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="{{ asset('dashboard_assets/js/jquery.scrollUp.min.js') }} "></script>
    <!-- counterup JS
		============================================ -->
    <script src="{{ asset('dashboard_assets/js/main.js') }} "></script>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js"></script>
    <script>tinymce.init({selector:'textarea'});</script>
</body>

</html>
