<header class="main-header">
    <a class="logo"> <!-- Logo -->
        <span class="logo-mini">
            <!--<b>A</b>BD-->
            <img src="{{ asset('assets/dist/img/mini-logo.png') }}" alt="">
        </span>
        <span class="logo-lg">
            <!--<b>Admin</b>BD-->
            <img src="{{ asset('assets/dist/img/main-logo.png') }}" alt="">
        </span>
    </a>
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top ">
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button"> <!-- Sidebar toggle button-->
            <span class="sr-only">Toggle navigation</span>
            <span class="fa fa-tasks"></span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <ul class="nav navbar-nav">
                    <!-- user -->
                    <li class="dropdown dropdown-user admin-user">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <div class="user-image">
                             <span class="text-white">Welcome, {{ Sentinel::getUser()->full_name }} &nbsp;&nbsp;</span>
                             <img src="http://localhost:8000/assets/dist/img/avatar4.png" class="img-circle" height="40" width="40" alt="User Image">
                         </div>
                     </a>
                     <ul class="dropdown-menu">
                        <li><a href="profile.html"><i class="fa fa-users"></i> User Profile</a></li>
                        <li><a href="#"><i class="fa fa-gear"></i> Settings</a></li>
                        <li><a href="javascript:void(0)" onclick="document.getElementById('form-logout').submit()"><i class="fa fa-sign-out"></i> Logout</a></li>
                        <form action="{{ route('logout') }}" method="POST" id="form-logout">

                            {{ csrf_field() }}

                        </form>

                    </ul>
                </li>
            </ul>
        </ul>
    </div>
</nav>
</header>