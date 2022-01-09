<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">
                    <span>Main</span>
                </li>
                <li>
                    <a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
                </li>

                <li>
                    <a href="{{route('logs')}}"><i class="fa fa-history"></i> <span>Events</span></a>
                </li>
                <li>
                    <a href="{{route('Auth_logs')}}"><i class="fa fa-history"></i> <span>Auth logs</span></a>
                </li>

                <li class="submenu">

                    <a href="#"><i class="fa fa-product-hunt"></i> <span> Projects</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{route('ShowAddProduct')}}">Add Project</a></li>
                        <li><a href="{{route('allProjects')}}">All Projects</a></li>
                    </ul>
                </li>

                <li class="submenu">

                    <a href="#"><i class="fa fa-user-circle"></i> <span> Users</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{route('ShowAddUser')}}">Add Staff</a></li>
                        <li><a href="{{route('AllUsers')}}">All Staff</a></li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
</div>
<!-- /Sidebar -->
