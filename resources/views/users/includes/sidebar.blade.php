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
            <li class="@if(Request::is('user/topup_history')) active  @endif">
                <a href="{{ route('topup_history') }}">
                    <i class="fa fa-money"></i><span>Top Up History</span>
                </a>
            </li>

            <li class="@if(Request::is('user/spending_history')) active  @endif">
                <a href="{{ route('spending_history') }}">
                    <i class="fa fa-plus-square"></i><span>Toll Plaza Spendings</span>
                </a>
            </li>
        </li>
        
        <li class="@if(Request::is('user/profile')) active  @endif">
            <a href="{{ route('userProfileEdit') }}">
                <i class="fa fa-user-circle"></i><span> My Profile</span>
            </a>
        </li>                
    </ul>
</div> <!-- /.sidebar -->
</aside>