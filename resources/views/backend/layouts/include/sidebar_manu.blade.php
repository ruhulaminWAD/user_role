{{-- sidebar manu --}}
<div id="left-sidebar" class="sidebar">
    <div class="navbar-brand">
        <a href="{{ route('home') }}"><img src="{{ asset('backend') }}/assets/images/icon-dark.svg" alt="HexaBit Logo"
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
                <span>{{ Auth::user()->role->role_name }}</span>
                <a href="javascript:void(0);" class="dropdown-toggle user-name"
                    data-toggle="dropdown"><strong>{{ Auth::user()->name }}</strong></a>
                <ul class="dropdown-menu dropdown-menu-right account">
                    <li><a href="{{ route('myProfile') }}"><i class="icon-user"></i>My Profile</a></li>
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

                <li class="active"><a href="{{ route('home') }}"><i class="icon-home"></i><span>Dashboard</span></a>
                </li>
                <li> <span> SYSTEM SETTING</span> </li>

                @can('index-role')
                <li>
                    <a href="#uiElements" class="has-arrow"><i class="icon-diamond"></i><span>Module Settings</span></a>
                    <ul>
                        <li><a href="{{ route('module.index') }}">Modules List</a></li>
                        <li><a href="{{ route('module.create') }}">Module Create</a></li>

                    </ul>
                </li>
                @endcan

                @can('index-role')
                <li>
                    <a href="#uiElements" class="has-arrow"><i class="icon-diamond"></i><span>Permission Settings</span></a>
                    <ul>
                        <li><a href="{{ route('permission.index') }}">Permissions List</a></li>
                        <li><a href="{{ route('permission.create') }}">Permission Create</a></li>

                    </ul>
                </li>
                @endcan

                @can('index-role')
                <li>
                    <a href="#uiElements" class="has-arrow"><i class="icon-diamond"></i><span>Role Settings</span></a>
                    <ul>
                        <li><a href="{{ route('role.index') }}">Roles List</a></li>
                        @can('create-role')
                        <li><a href="{{ route('role.create') }}">Role Create</a></li>
                        @endcan

                    </ul>
                </li>
                @endcan

                @can('index-user')
                <li>
                    <a href="#uiElements" class="has-arrow"><i class="icon-diamond"></i><span>User Settings</span></a>
                    <ul>
                        <li><a href="{{ route('user.index') }}">Users List</a></li>
                        @can('create-user')
                        <li><a href="{{ route('user.create') }}">User Create</a></li>
                        @endcan

                    </ul>
                </li>
                @endcan

                @can('index-page')
                <li>
                    <a href="#uiElements" class="has-arrow"><i class="icon-diamond"></i><span>Pages Builder</span></a>
                    <ul>
                        <li><a href="{{ route('page.index') }}">Pages List</a></li>
                        @can('create-page')
                        <li><a href="{{ route('page.create') }}">Page Create</a></li>
                        @endcan

                    </ul>
                </li>
                @endcan


            </ul>
        </nav>
    </div>
</div>
