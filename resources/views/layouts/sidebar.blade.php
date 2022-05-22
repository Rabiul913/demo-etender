<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/home" class="brand-link">
      <img src="{{asset ('dist/img/acl.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">e-Tender</span>
    </a>
    
                              

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      
                                
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('dist/img/user2.png')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="/users/profile" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>



      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                @canany(['user-create','user-edit','user-list','user-delete'])
                <a href="{{ route('users.index') }}" class="nav-link">
                  <i class="fas fa-users nav-icon"></i>
                  <p>User Management</p>
                </a>
                @endcanany
              </li>
              
              <li class="nav-item">
                @canany(['product-create','product-edit','product-list','product-delete'])
                <a href="{{ route('products.index') }}" class="nav-link">
                  <i class="fab fa-product-hunt nav-icon"></i>
                  <p>Product Management</p>
                </a>
                @endcanany
              </li>

              <li class="nav-item">
                @canany(['role-create','role-edit','role-list','role-delete'])
                <a href="{{ route('roles.index') }}" class="nav-link">
                  <i class="fas fa-user-tag  nav-icon"></i>
                  <p>Role Management</p>
                </a>
                @endcanany
              </li>
            
              <li class="nav-item">
                @canany(['permission-create','permission-edit','permission-list','permission-delete'])
                <a href="{{ route('permissions.index') }}" class="nav-link">
                  <i class="fas fa-unlock-alt nav-icon"></i>
                  <p>Permission Management</p>
                </a>
                @endcanany
              </li>

              <li class="nav-item">
                @canany(['tender-create','tender-edit','tender-list','tender-delete'])
                <a href="{{ route('tenders.index') }}" class="nav-link">
                  <i class="fas fa-gavel nav-icon"></i>
                  <p>Tender Management</p>
                </a>
                @endcanany
              </li>

              <li class="nav-item">
                @canany(['buyer-create','buyer-edit','buyer-list','buyer-delete'])
                <a href="{{ route('buyers.index') }}" class="nav-link">
                  <i class="fab fa-brands fa-first-order nav-icon"></i>
                  <p>Buyer Management</p>
                </a>
                @endcanany
              </li>

              <li class="nav-item">
                @canany(['proposal-create','proposal-edit','proposal-list','proposal-delete'])
                <a href="{{ route('proposals.index') }}" class="nav-link">
                  <i class="fab fa-brands fa-first-order nav-icon"></i>
                  <p>Proposal Management</p>
                </a>
                @endcanany
              </li>
            </ul>
          </li>
          <li class="nav-item dropdown">
             
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>


                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
