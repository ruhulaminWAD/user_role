{{-- sidebar manu --}}
<div id="left-sidebar" class="sidebar">
    <div class="navbar-brand">
        <a href="index.html"><img src="{{ asset('backend') }}/assets/images/icon-dark.svg" alt="HexaBit Logo"
                class="img-fluid logo"><span>HexaBit</span></a>
        <button type="button" class="btn-toggle-offcanvas btn btn-sm btn-default float-right"><i
                class="lnr lnr-menu fa fa-chevron-circle-left"></i></button>
    </div>
    <div class="sidebar-scroll">
        <div class="user-account">
            <div class="user_div">
                <img src="{{ asset('backend') }}/assets/images/user.png" class="user-photo" alt="User Profile Picture">
            </div>
            <div class="dropdown">
                <span>Welcome,</span>
                <a href="javascript:void(0);" class="dropdown-toggle user-name"
                    data-toggle="dropdown"><strong>Christy Wert</strong></a>
                <ul class="dropdown-menu dropdown-menu-right account">
                    <li><a href="page-profile.html"><i class="icon-user"></i>My Profile</a></li>
                    <li><a href="app-inbox.html"><i class="icon-envelope-open"></i>Messages</a></li>
                    <li><a href="javascript:void(0);"><i class="icon-settings"></i>Settings</a></li>
                    <li class="divider"></li>
                    {{-- <li><a href="page-login.html"><i class="icon-power"></i>Logout</a></li> --}}
                    <li>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();"><i
                                class="icon-power"></i>Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>
        <nav id="left-sidebar-nav" class="sidebar-nav">
            <ul id="main-menu" class="metismenu">

                <li class="active"><a href="index.html"><i class="icon-home"></i><span>Dashboard</span></a>
                </li>
                <li> <span> SYSTEM SETTING</span> </li>
                <li>
                    <a href="#uiElements" class="has-arrow"><i class="icon-diamond"></i><span>Module Settings</span></a>
                    <ul>
                        <li><a href="{{ route('module.index') }}">Module List</a></li>
                        <li><a href="{{ route('module.create') }}">Module Create</a></li>

                    </ul>
                </li>



            </ul>
        </nav>
    </div>
</div>
