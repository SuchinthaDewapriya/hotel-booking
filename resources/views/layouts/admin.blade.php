@include('includes.adminHeader')

<link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet">
<style>
.logo-font{
    font-family: 'Pacifico', cursive;
}
</style>
<div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
          <!-- Left navbar links -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
            </li>
          </ul>
    
      
          <!-- Right navbar links -->
          <ul class="navbar-nav ml-auto">
            <!-- Messages Dropdown Menu -->
            {{-- <li class="nav-item dropdown">
              <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-comments"></i>
                <span class="badge badge-danger navbar-badge">3</span>
              </a>
              <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a href="#" class="dropdown-item">
                  <!-- Message Start -->
                  <div class="media">
                    <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                    <div class="media-body">
                      <h3 class="dropdown-item-title">
                        Brad Diesel
                        <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                      </h3>
                      <p class="text-sm">Call me whenever you can...</p>
                      <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                    </div>
                  </div>
                  <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                  <!-- Message Start -->
                  <div class="media">
                    <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                    <div class="media-body">
                      <h3 class="dropdown-item-title">
                        John Pierce
                        <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                      </h3>
                      <p class="text-sm">I got your message bro</p>
                      <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                    </div>
                  </div>
                  <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                  <!-- Message Start -->
                  <div class="media">
                    <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                    <div class="media-body">
                      <h3 class="dropdown-item-title">
                        Nora Silvester
                        <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                      </h3>
                      <p class="text-sm">The subject goes here</p>
                      <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                    </div>
                  </div>
                  <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
              </div>
            </li> --}}
            <!-- Notifications Dropdown Menu -->
            {{-- <li class="nav-item dropdown">
              <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                <span class="badge badge-warning navbar-badge">15</span>
              </a>
              <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">15 Notifications</span>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                  <i class="fas fa-envelope mr-2"></i> 4 new messages
                  <span class="float-right text-muted text-sm">3 mins</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                  <i class="fas fa-users mr-2"></i> 8 friend requests
                  <span class="float-right text-muted text-sm">12 hours</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                  <i class="fas fa-file mr-2"></i> 3 new reports
                  <span class="float-right text-muted text-sm">2 days</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
              </div>
            </li> --}}
            <li class="nav-item">
              <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="{{ route('logout') }} " onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
                <i class="fa fa-sign-out" aria-hidden="true"></i> Logout
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
            </li>
          </ul>
        </nav>
        <!-- /.navbar -->
      
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
          <!-- Brand Logo -->
          <a href="{{ url('/')}}" target="_blank" class="brand-link">
            <span class="brand-text font-weight-light">Secret Paradise Villa</span>
          </a>
      
          <!-- Sidebar -->
          <div class="sidebar">
      
            <!-- Sidebar Menu -->
            <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ url('admin')}}" class="nav-link {{ request()->is('admin') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('admin/reservations')}}" class="nav-link {{ request()->is('admin/reservations') ? 'active' : '' }}">
                      <i class="nav-icon fas fa-table"></i>
                      <p>Reservations</p>
                  </a>
                </li>
                @if (Auth::user()->type == 'admin')
                <li class="nav-item">
                  <a href="{{ url('admin/rooms')}}" class="nav-link {{ request()->is('admin/rooms') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-bed"></i>
                      <p>Rooms</p>
                  </a>
                </li>
                
                <!-- <li class="nav-item">
                  <a href="{{ url('packages')}}" class="nav-link">
                    <i class="nav-icon fas fa-coffee"></i>
                      <p>Packages</p>
                  </a>
                </li> -->
                <li class="nav-item">
                  <a href="{{ url('admin/menus')}}" class="nav-link {{ request()->is('admin/menus') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-wine-bottle"></i>
                      <p>Menus</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('admin/customers')}}" class="nav-link {{ request()->is('admin/customers') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-users"></i>
                      <p>Customers</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('admin/coupons')}}" class="nav-link {{ request()->is('admin/coupons') ? 'active' : '' }}">
                    <i class="nav-icon fa fa-percent"></i> 
                      <p>Coupons</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('admin/faqs')}}" class="nav-link {{ request()->is('admin/faqs') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-question-circle"></i>
                      <p>FAQs</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('admin/users')}}" class="nav-link {{ request()->is('admin/reservations') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-user"></i>
                      <p>Users</p>
                  </a>
                </li>
                <!-- <li class="nav-item">
                  <a href="{{ url('admin/settings')}}" class="nav-link {{ request()->is('admin/settings') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-cog"></i>
                      <p>Settings</p>
                  </a>
                </li> -->
                @endif
              </ul>
            </nav>
            <!-- /.sidebar-menu -->
          </div>
          <!-- /.sidebar -->
        </aside>
    <div class="content-wrapper">   
    @yield('adminContent')
    </div>
</div>
@include('includes.adminFooter')