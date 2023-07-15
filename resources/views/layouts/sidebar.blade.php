  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('AdminLTE')}}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Kedai Kopi Super</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{route('home')}}" class="{{ request()->is('home') ? 'nav-link active' : 'nav-link'}}">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Beranda
              </p>
            </a>
          </li>
          <!-- Product -->
          <li class="nav-item">
            <a href="{{route('product.index')}}" class="{{ request()->is('product') ? 'nav-link active' : 'nav-link'}}">
              <i class="nav-icon fas fa-weight-hanging"></i>
              <p>
                 Data Produk
              </p>
            </a>
          </li>
          <!-- Category -->
          <li class="nav-item">
          <a href="{{route('category.index')}}" class="{{ request()->is('category') ? 'nav-link active' : 'nav-link'}}">
              <i class="nav-icon fas fa-shapes"></i>
              <p>
                 Data Kategori
              </p>
            </a>
          </li>
          <!-- Customer Orders -->
          <li class="nav-item">
          <a href="{{route('customer-order.index')}}" class="{{ request()->is('customer-order') ? 'nav-link active' : 'nav-link'}}">
              <i class="nav-icon fas fa-comment-dots"></i>
              <p>
                Pesanan Pelanggan
              </p>
            </a>
          </li>
          <!-- Sales Report -->
          <li class="nav-item">
          <a href="{{route('sales-report.index')}}" class="{{ request()->is('sales-report') ? 'nav-link active' : 'nav-link'}}">
              <i class="nav-icon fas fa-money-bill-wave-alt"></i>
              <p>
                Laporan Penjualan
              </p>
            </a>
          </li>
          <!-- Cashier -->
          <li class="nav-item">
          <a href="{{route('cashier.index')}}" class="{{ request()->is('cashier') ? 'nav-link active' : 'nav-link'}}">
                <i class="nav-icon fas fa-edit"></i>
              <p>
                Data Kasir
              </p>
            </a>
          </li>
          <!-- Meja -->
          <li class="nav-item">
            <a href="{{route('meja.index')}}" class="{{ request()->is('meja') ? 'nav-link active' : 'nav-link'}}">
                <i class="nav-icon fas fa-shapes"></i>
                <p>
                   Data Meja
                </p>
              </a>
            </li>
          <!-- kedai-kopi-super -->
          <li class="nav-item">
          <a href="{{route('kedai-kopi-super.index')}}" class="{{ request()->is('kedai-kopi-super') ? 'nav-link active' : 'nav-link'}}">
                <i class="nav-icon fas fa-home"></i>
              <p>
                Kedai Kopi Super
              </p>
            </a>
          </li>
        
          <!-- Order -->
          <li class="nav-item">
          <a href="{{route('order.index')}}" class="{{ request()->is('order') ? 'nav-link active' : 'nav-link'}}">
            <i class="nav-icon fas fa-comment-dots"></i>
              <p>
                Pesanan
              </p>
            </a>
          </li>
        </ul>
      </nav>
    </div>
    <!-- /.sidebar -->
  </aside>

