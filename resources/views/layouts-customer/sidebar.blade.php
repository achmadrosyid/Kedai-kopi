  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('AdminLTE')}}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Kedai Kopi Super</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('AdminLTE')}}/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Admin</a>
        </div>
      </div> -->

      <!-- SidebarSearch Form -->
      <!-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="{{route('home.index')}}" class="{{ request()->is('home') ? 'nav-link active' : 'nav-link'}}">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home
                <!-- <i class="right fas fa-angle-left"></i> -->
              </p>
            </a>
          </li>
          <!-- Product -->
          <li class="nav-item">
            <a href="{{route('product.index')}}" class="{{ request()->is('product') ? 'nav-link active' : 'nav-link'}}">
              <i class="nav-icon fas fa-weight-hanging"></i>
              <p>
                 Product
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
          <!-- Category -->
          <li class="nav-item">
          <a href="{{route('category.index')}}" class="{{ request()->is('category') ? 'nav-link active' : 'nav-link'}}">
              <!-- <i class="nav-icon fas fa-th"></i> -->
              <i class="nav-icon fas fa-shapes"></i>
              <p>
                 Category
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
          <!-- Customer Orders -->
          <li class="nav-item">
          <a href="{{route('customer-order.index')}}" class="{{ request()->is('customer-order') ? 'nav-link active' : 'nav-link'}}">
              <!-- <i class="nav-icon fas fa-th"></i> -->
              <i class="nav-icon fas fa-comment-dots"></i>
              <p>
                Customer Orders
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
          <!-- Sales Report -->
          <li class="nav-item">
          <a href="{{route('sales-report.index')}}" class="{{ request()->is('sales-report') ? 'nav-link active' : 'nav-link'}}">
              <i class="nav-icon fas fa-money-bill-wave-alt"></i>
              <p>
                Sales Report
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
          <!-- Cashier -->
          <li class="nav-item">
          <a href="{{route('cashier.index')}}" class="{{ request()->is('cashier') ? 'nav-link active' : 'nav-link'}}">
                <i class="nav-icon fas fa-edit"></i>
              <p>
                Cashier
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

