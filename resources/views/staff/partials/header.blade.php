<!-- Header -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<div class="header">
    <!-- Logo -->
    <div class="header-left">
        <a href="index.html" class="logo">
            <img src="{{asset('./assets/img/CodLogic.png')}}" alt="Logo">
        </a>
        <a href="" class="logo logo-small">
            <img src="{{asset('./assets/img/CodLogic.png')}}" alt="Logo" width="10" height="30">
        </a>
    </div>
    <!-- /Logo -->

    <a href="javascript:void(0);" id="toggle_btn" style="margin-left: 34px">
        <i class="fe fe-text-align-left"></i>
    </a>

    <div style="display: inline-flex">
        <div class="top-nav-search" style="display: inline-flex">
            <form action="{{route('SearchStaff')}}" method="get">
                @csrf
                <input type="text"  name="search"  class="form-control" placeholder="Search project">
                <button id="searchBtn" class="btn" type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
        <div id="app" >
            @if(!empty($successMsg))
                <div class="alert alert-success" style="height: 40px; margin-top: 10px; margin-left: 10px;">
                    {{$successMsg}}
                </div>
            @endif
        </div>
    </div>



    <!-- Mobile Menu Toggle -->
    <a class="mobile_btn" id="mobile_btn">
        <i class="fa fa-bars"></i>
    </a>
    <!-- /Mobile Menu Toggle -->

    <!-- Header Right Menu -->
    <ul class="nav user-menu">

        <li id="clock"  style="font-size: 20px; text-decoration: none; margin-top: 15px">Time</li>
        <!-- User Menu -->
        <li class="nav-item dropdown has-arrow">
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                <span class="user-img"><img class="rounded-circle" src="{{asset('./assets/img/profiles/avatar-01.jpg')}}" width="31" alt="Ryan Taylor"></span>
            </a>
            <div class="dropdown-menu">
                <div class="user-header">
                    <div class="avatar avatar-sm">
                        <img src="{{asset('./assets/img/profiles/avatar-01.jpg')}}" alt="User Image" class="avatar-img rounded-circle">
                    </div>
                    <div class="user-text">
                        <h6>{{Auth::user()->name}}</h6>
                        <p class="text-muted mb-0" style="color: white">Staff</p>
                    </div>
                </div>
                <a class="dropdown-item" href="profile.html">My Profile</a>
                <a class="dropdown-item" href="settings.html">Settings</a>
{{--                <a class="dropdown-item" href="login.html">Logout</a>--}}
                <a class="dropdown-item">
                    {{--                <a class="nav-link header-login" href="login.html">Logout</a>--}}
                    <a class="nav-link header-login" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="dropdown-item get-started-btn scrollto" style="color: black"><i class="fa fa-lock"></i>
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </a>
            </div>
        </li>
        <!-- /User Menu -->

    </ul>
    <!-- /Header Right Menu -->

</div>
<!-- /Header -->
@include('partials.time')

