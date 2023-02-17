
{{-- Header Section --}}

<nav class="navbar navbar-fixed-top">
    <div class="container-fluid">

        <div class="navbar-left">
            <div class="navbar-btn">
                <a href="{{ route('home') }}"><img src="{{ asset('backend') }}/assets/images/icon-light.svg" alt="HexaBit Logo"
                        class="img-fluid logo"></a>
                <button type="button" class="btn-toggle-offcanvas"><i
                        class="lnr lnr-menu fa fa-bars"></i></button>
            </div>
            <a href="javascript:void(0);" class="icon-menu btn-toggle-fullwidth"><i
                    class="fa fa-arrow-left"></i></a>
            <ul class="nav navbar-nav">
                <li class="dropdown dropdown-animated scale-right">
                    <a href="javascript:void(0);" class="dropdown-toggle icon-menu" data-toggle="dropdown"><i
                            class="icon-grid"></i></a>
                    <ul class="dropdown-menu menu-icon app_menu">
                        <li>
                            <a class="#">
                                <i class="icon-envelope"></i>
                                <span>Inbox</span>
                            </a>
                        </li>
                        <li>
                            <a class="#">
                                <i class="icon-bubbles"></i>
                                <span>Chat</span>
                            </a>
                        </li>
                        <li>
                            <a class="#">
                                <i class="icon-list"></i>
                                <span>Task</span>
                            </a>
                        </li>
                        <li>
                            <a class="#">
                                <i class="icon-globe"></i>
                                <span>Blog</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li><a href="app-calendar.html" class="icon-menu d-none d-sm-block d-md-none d-lg-block"><i
                            class="icon-calendar"></i></a></li>
                <li><a href="app-chat.html" class="icon-menu d-none d-sm-block"><i class="icon-bubbles"></i></a>
                </li>
            </ul>
        </div>

        <div class="navbar-right">
            <form id="navbar-search" class="navbar-form search-form">
                <input value="" class="form-control" placeholder="Search here..." type="text">
                <button type="button" class="btn btn-default"><i class="icon-magnifier"></i></button>
            </form>

            <div id="navbar-menu">
                <ul class="nav navbar-nav">
                    <li class="dropdown dropdown-animated scale-left">
                        <a href="javascript:void(0);" class="dropdown-toggle icon-menu" data-toggle="dropdown">
                            <i class="icon-envelope"></i>
                            <span class="notification-dot"></span>
                        </a>
                        <ul class="dropdown-menu right_chat email">
                            <li>
                                <a href="javascript:void(0);">
                                    <div class="media">
                                        <img class="media-object " src="{{ asset('backend') }}/assets/images/xs/avatar4.jpg"
                                            alt="">
                                        <div class="media-body">
                                            <span class="name">James Wert <small class="float-right">Just
                                                    now</small></span>
                                            <span class="message">Lorem ipsum Veniam aliquip culpa laboris
                                                minim tempor</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">
                                    <div class="media">
                                        <img class="media-object " src="{{ asset('backend') }}/assets/images/xs/avatar1.jpg"
                                            alt="">
                                        <div class="media-body">
                                            <span class="name">Folisise Chosielie <small
                                                    class="float-right">12min ago</small></span>
                                            <span class="message">There are many variations of Lorem Ipsum
                                                available, but the majority</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">
                                    <div class="media">
                                        <img class="media-object " src="{{ asset('backend') }}/assets/images/xs/avatar5.jpg"
                                            alt="">
                                        <div class="media-body">
                                            <span class="name">Ava Alexander <small
                                                    class="float-right">38min ago</small></span>
                                            <span class="message">Many desktop publishing packages and web page
                                                editors</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">
                                    <div class="media mb-0">
                                        <img class="media-object " src="{{ asset('backend') }}/assets/images/xs/avatar2.jpg"
                                            alt="">
                                        <div class="media-body">
                                            <span class="name">Debra Stewart <small class="float-right">2hr
                                                    ago</small></span>
                                            <span class="message">Contrary to popular belief, Lorem Ipsum is
                                                not simply random text</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown dropdown-animated scale-left">
                        <a href="javascript:void(0);" class="dropdown-toggle icon-menu"
                            data-toggle="dropdown">
                            <i class="icon-bell"></i>
                            <span class="notification-dot"></span>
                        </a>
                        <ul class="dropdown-menu feeds_widget">
                            <li class="header">You have 5 new Notifications</li>
                            <li>
                                <a href="javascript:void(0);">
                                    <div class="feeds-left"><i class="fa fa-thumbs-o-up text-success"></i>
                                    </div>
                                    <div class="feeds-body">
                                        <h4 class="title text-success">7 New Feedback <small
                                                class="float-right text-muted">Today</small></h4>
                                        <small>It will give a smart finishing to your site</small>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">
                                    <div class="feeds-left"><i class="fa fa-user"></i></div>
                                    <div class="feeds-body">
                                        <h4 class="title">New User <small
                                                class="float-right text-muted">10:45</small></h4>
                                        <small>I feel great! Thanks team</small>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">
                                    <div class="feeds-left"><i class="fa fa-question-circle text-warning"></i>
                                    </div>
                                    <div class="feeds-body">
                                        <h4 class="title text-warning">Server Warning <small
                                                class="float-right text-muted">10:50</small></h4>
                                        <small>Your connection is not private</small>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">
                                    <div class="feeds-left"><i class="fa fa-check text-danger"></i></div>
                                    <div class="feeds-body">
                                        <h4 class="title text-danger">Issue Fixed <small
                                                class="float-right text-muted">11:05</small></h4>
                                        <small>WE have fix all Design bug with Responsive</small>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">
                                    <div class="feeds-left"><i class="fa fa-shopping-basket"></i></div>
                                    <div class="feeds-body">
                                        <h4 class="title">7 New Orders <small
                                                class="float-right text-muted">11:35</small></h4>
                                        <small>You received a new oder from Tina.</small>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li><a href="javascript:void(0);" class="right_toggle icon-menu" title="Right Menu"><i
                                class="icon-settings"></i></a></li>
                    {{-- <li><a href="page-login.html" class="icon-menu"><i class="icon-power"></i></a></li> --}}
                    <li>
                        <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();" class="icon-menu"><i class="icon-power"></i></a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
