<aside class="main-sidebar">
    <!-- sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="image pull-left">
                <img src="{{ asset('assets/dist/img/avatar5.png') }}" class="img-circle" alt="User Image">
            </div>
            <div class="info">
                <h4>Welcome</h4>
                <p>{{ Sentinel::getUser()->full_name }}</p>
            </div>
        </div>

        <!-- sidebar menu -->
        <ul class="sidebar-menu">
            <li class="@if(Request::is('admin/admin_dashboard')) active  @endif">
                <a href="{{ route('admin_dashboard') }}"><i class="fa fa-hospital-o"></i><span>Dashboard</span>
                </a>
            </li>
            <li class="@if(Request::is('admin/view_registration') || Request::is('admin/view_registered') || Request::is('admin/view_rejected')) active  @endif">
                <a href="#">
                    <i class="fa fa-user-md"></i><span>Users</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('view_registration') }}">View Registrations</a></li>
                    <li><a href="{{ route('view_registered') }}">View Registered Users</a></li>
                    <li><a href="{{ route('view_rejected') }}">View Rejected Users</a></li>

                </ul>
            </li>
            <li class="@if(Request::is('admin/topup')) active  @endif">
                <a href="{{ route('topup') }}"><i class="fa fa-hospital-o"></i><span>Toll Up Smart Card</span>
                </a>
            </li>
            <li class="@if(Request::is('admin/toll_plaza')) active  @endif">
                <a href="{{ route('toll_plaza') }}"><i class="fa fa-hospital-o"></i><span>Toll Plaza Master</span>
                </a>
            </li>
        </li>

        <li class="@if(Request::is('admin/profile')) active  @endif">
            <a href="{{ route('adminProfileEdit') }}">
                <i class="fa fa-user-circle"></i><span> My Profile</span>
            </a>
        </li>                
    </ul>
</div> <!-- /.sidebar -->
</aside>