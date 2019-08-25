<div class="header-top-area">
    <div class="fixed-header-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-1 col-md-6 col-sm-6 col-xs-12">
                    <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
                        <i class="fa fa-bars"></i>
                    </button>
                    <div class="admin-logo logo-wrap-pro">
                        <a href="#"><img src="{{ asset('dashboard_assets/img/logo/log.png') }}" alt="" />
                        </a>
                    </div>
                </div>

                <div class="col-lg-6 col-md-1 col-sm-1 col-xs-12">

                </div>

                <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
                    <div class="header-right-info">
                        <ul class="nav navbar-nav mai-top-nav header-right-menu">
                            <li class="nav-item dropdown">
                                <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><span class="adminpro-icon adminpro-chat-pro"></span><span class="indicator-ms"></span></a>
                                <div role="menu" class="author-message-top dropdown-menu animated flipInX">
                                    <div class="message-single-top">
                                        <h1>Message</h1>
                                    </div>
                                    <ul class="message-menu">
                                        <li>
                                            <a href="#">
                                                <div class="message-img">
                                                    <img src="{{ asset('dashboard_assets/img/message/1.jpg') }}" alt="">
                                                </div>
                                                <div class="message-content">
                                                    <span class="message-date">16 Sept</span>
                                                    <h2>Advanda Cro</h2>
                                                    <p>Please done this project as soon possible.</p>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="message-view">
                                        <a href="#">View All Messages</a>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa fa-bell-o" aria-hidden="true"></i><span class="indicator-nt"></span></a>
                                <div role="menu" class="notification-author dropdown-menu animated flipInX">
                                    <div class="notification-single-top">
                                        <h1>Notifications</h1>
                                    </div>
                                    <ul class="notification-menu">
                                        <li>
                                            <a href="#">
                                                <div class="notification-icon">
                                                    <span class="adminpro-icon adminpro-checked-pro"></span>
                                                </div>
                                                <div class="notification-content">
                                                    <span class="notification-date">16 Sept</span>
                                                    <h2>Advanda Cro</h2>
                                                    <p>Please done this project as soon possible.</p>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="notification-view">
                                        <a href="#">View All Notification</a>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                                    <span class="adminpro-icon adminpro-user-rounded header-riht-inf"></span>
                                    <span class="admin-name">Advanda Cro</span>
                                    <span class="author-project-icon adminpro-icon adminpro-down-arrow"></span>
                                </a>
                                <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated flipInX">
                                  @if (App\User::where('id',Auth::id())->where('role', 1)->exists())
                                    <li>
                                      <a href="#"><span class="adminpro-icon adminpro-user-rounded author-log-ic"></span>My Profile</a>
                                    </li>                                      
                                  @endif
                                    <li >
                                      <a class="adminpro-icon adminpro-locked author-log-ic" href="{{ route('logout') }}"
                                         onclick="event.preventDefault();
                                                       document.getElementById('logout-form').submit();">
                                          {{ __('Logout') }}
                                      </a>

                                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                          @csrf
                                      </form>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item nav-setting-open"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa fa-tasks"></i></a>

                                <div role="menu" class="admintab-wrap menu-setting-wrap menu-setting-wrap-bg dropdown-menu animated flipInX">
                                    <ul class="nav nav-tabs custon-set-tab">
                                        <li class="active"><a data-toggle="tab" href="#Notes">Notes</a>
                                        </li>
                                        <li><a data-toggle="tab" href="#Settings">Settings</a>
                                        </li>
                                    </ul>

                                    <div class="tab-content">
                                        <div id="Notes" class="tab-pane fade in active">
                                            <div class="notes-area-wrap">
                                                <div class="note-heading-indicate">
                                                    <h2><i class="fa fa-comments-o"></i> Latest Notes</h2>
                                                    <p>You have 10 new message.</p>
                                                </div>
                                                <div class="notes-list-area notes-menu-scrollbar">
                                                    <ul class="notes-menu-list">
                                                        <li>
                                                            <a href="#">
                                                                <div class="notes-list-flow">
                                                                    <div class="notes-img">
                                                                        <img src="{{ asset('dashboard_assets/img/notification/1.jpg') }}" alt="" />
                                                                    </div>
                                                                    <div class="notes-content">
                                                                        <p> The point of using Lorem Ipsum is that it has a more-or-less normal.</p>
                                                                        <span>Yesterday 2:45 pm</span>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                <div class="notes-list-flow">
                                                                    <div class="notes-img">
                                                                        <img src="{{ asset('dashboard_assets/img/notification/1.jpg') }}" alt="" />
                                                                    </div>
                                                                    <div class="notes-content">
                                                                        <p> The point of using Lorem Ipsum is that it has a more-or-less normal.</p>
                                                                        <span>Yesterday 2:45 pm</span>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="Settings" class="tab-pane fade">
                                            <div class="setting-panel-area">
                                                <div class="note-heading-indicate">
                                                    <h2><i class="fa fa-gears"></i> Settings Panel</h2>
                                                    <p> You have 20 Settings. 5 not completed.</p>
                                                </div>
                                                <ul class="setting-panel-list">
                                                    <li>
                                                        <div class="checkbox-setting-pro">
                                                            <div class="checkbox-title-pro">
                                                                <h2>Show notifications</h2>
                                                                <div class="ts-custom-check">
                                                                    <div class="onoffswitch">
                                                                        <input type="checkbox" name="collapsemenu" class="onoffswitch-checkbox" id="example">
                                                                        <label class="onoffswitch-label" for="example">
                                                                            <span class="onoffswitch-inner"></span>
                                                                            <span class="onoffswitch-switch"></span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="checkbox-setting-pro">
                                                            <div class="checkbox-title-pro">
                                                                <h2>Disable Chat</h2>
                                                                <div class="ts-custom-check">
                                                                    <div class="onoffswitch">
                                                                        <input type="checkbox" name="collapsemenu" class="onoffswitch-checkbox" id="example3">
                                                                        <label class="onoffswitch-label" for="example3">
                                                                            <span class="onoffswitch-inner"></span>
                                                                            <span class="onoffswitch-switch"></span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>

                                                    <li>
                                                        <div class="checkbox-setting-pro">
                                                            <div class="checkbox-title-pro">
                                                                <h2>Show charts</h2>
                                                                <div class="ts-custom-check">
                                                                    <div class="onoffswitch">
                                                                        <input type="checkbox" name="collapsemenu" class="onoffswitch-checkbox" id="example7">
                                                                        <label class="onoffswitch-label" for="example7">
                                                                            <span class="onoffswitch-inner"></span>
                                                                            <span class="onoffswitch-switch"></span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
