<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="/home" class="brand-link">
    <img src="{{asset ('dist/img/acl.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Demo e-Tender</span>
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

             <li class="nav-item">
              <a href="{{ route('home') }}" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
      
  @canany(['user-create','user-edit','user-list','user-delete','role-create','role-edit','role-list','role-delete','permission-create','permission-edit','permission-list','permission-delete'])
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
            <p>
              User Management
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              @canany(['user-create','user-edit','user-list','user-delete'])
              <a href="{{ route('users.index') }}" class="nav-link">
                <i class="fas fa-users nav-icon"></i>
                <p>User List</p>
              </a>
              @endcanany
            </li>
            
            {{-- <li class="nav-item">
              @canany(['product-create','product-edit','product-list','product-delete'])
              <a href="{{ route('products.index') }}" class="nav-link">
                <i class="fab fa-product-hunt nav-icon"></i>
                <p>Product Management</p>
              </a>
              @endcanany
            </li> --}}

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
              @canany(['designation-create','designation-edit','designation-list','designation-delete'])
              <a href="{{ route('designations.index') }}" class="nav-link">
                <i class="fas fa-unlock-alt nav-icon"></i>
                <p>Designation Management</p>
              </a>
              @endcanany
            </li>

       

            {{-- <li class="nav-item">
              @canany(['buyer-create','buyer-edit','buyer-list','buyer-delete'])
              <a href="{{ route('buyers.index') }}" class="nav-link">
                <i class="fab fa-brands fa-first-order nav-icon"></i>
                <p>Buyer Management</p>
              </a>
              @endcanany
            </li> --}}

            {{-- <li class="nav-item">
              @canany(['proposal-create','proposal-edit','proposal-list','proposal-delete'])
              <a href="{{ route('proposals.index') }}" class="nav-link">
                <i class="fab fa-brands fa-first-order nav-icon"></i>
                <p>Proposal Management</p>
              </a>
              @endcanany
            </li> --}}
        
          </ul>
        </li>
        @endcanany


        @canany(['tender-create','tender-edit','tender-list','tender-delete','tender_type-create','tender_type-edit','tender_type-list','tender_type-delete'])
        <li class="nav-item">
          <a href="{{ route('proposals.index') }}" class="nav-link">
            <i class="fab fa-brands fa-first-order nav-icon"></i>
            <p>
              Tender Management
              <i class="right fas fa-angle-left"></i>
              {{-- @can('proposal-create')
              <span class="badge badge-light">4</span>
              @endcan --}}
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              @canany(['tender-create','tender-edit','tender-list','tender-delete'])
              <a href="{{ route('tenders.index') }}" class="nav-link">
                <i class="fas fa-gavel nav-icon"></i>
                <p>Tender List</p>
              </a>
              @endcanany

              @canany(['tender_type-create','tender_type-edit','tender_type-list','tender_type-delete'])
              <a href="{{ route('tender_types.index') }}" class="nav-link">
                <i class="fas fa-gavel nav-icon"></i>
                <p>Tender Type List</p>
              </a>
              @endcanany


            </li>
          </ul>
        </li>
        @endcanany






        @canany(['proposal-create','proposal-edit','proposal-list','proposal-delete','proposal-shortlist','proposal-finallist'])
        <li class="nav-item">
          <a href="{{ route('proposals.index') }}" class="nav-link">
            <i class="fab fa-brands fa-first-order nav-icon"></i>
            <p>
              Proposal Management
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              @canany(['proposal-create','proposal-edit','proposal-list','proposal-delete'])
              <a href="{{ route('proposals.index') }}" class="nav-link">
                <i class="fas fa-sticky-note nav-icon"></i>
                <p>All Proposal List</p>
              </a>
            @endcanany
              @can('proposal-shortlist')
                       <a href="{{ url('proposals/shortfinallisted',1) }}" class="nav-link">
                        <i class="fas fa-clipboard nav-icon"></i>
                        <p>Short Proposal List</p>
                      </a>
              @endcan
              @can('proposal-finallist')
              <a href="{{ url('proposals/shortfinallisted',2) }}" class="nav-link">
                <i class="fas fa-clipboard-check nav-icon"></i>
                <p>Finalize Proposal List</p>
              </a>
              @endcan
            </li>
          </ul>
        </li>
        @endcanany
  

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
