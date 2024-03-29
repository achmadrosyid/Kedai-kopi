  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="{{ route('home') }}" class="brand-link">
          <img src="{{ asset('AdminLTE') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
              class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">Kedai Kopi Super</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
          @if (Auth::check())
              @if (Auth::user()->roles == 'admin' || Auth::user()->roles == 'cashier' || Auth::user()->roles == 'owner')
                  <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                      <div class="image">
                          <img src="https://i.pravatar.cc/300" class="img-circle elevation-2" alt="">
                      </div>
                      <div class="info">
                          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
                      </div>
                  </div>
              @endif
          @endif
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                  @if (Auth::check())
                      @if ( Auth::user()->roles == 'owner' || Auth::user()->roles == 'cashier' || Auth::user()->roles == 'admin')
                          <li class="nav-item">
                              <a href="{{ route('home') }}"
                                  class="{{ request()->is('home') ? 'nav-link active' : 'nav-link' }}">
                                  <i class="nav-icon fas fa-home"></i>
                                  <p>
                                      Beranda
                                  </p>
                              </a>
                          </li>
                      @endif
                  @endif
                  <!-- Product -->
                  @if (Auth::check())
                    @if (Auth::user()->roles == 'admin' || Auth::user()->roles == 'cashier' || Auth::user()->roles == 'owner')
                    <li class="nav-item">
                      <a href="{{ route('product.index') }}"
                          class="{{ request()->is('product') ? 'nav-link active' : 'nav-link' }}">
                          <i class="nav-icon fa fa-coffee" aria-hidden="true"></i>
                          <p>
                              Data Produk
                          </p>
                      </a>
                    </li>
                    @endif
                    @endif
                  <!-- Category -->
                  @if (Auth::check())
                     @if (Auth::user()->roles == 'admin' || Auth::user()->roles == 'cashier' || Auth::user()->roles == 'owner')
                  <li class="nav-item">
                      <a href="{{ route('category.index') }}"
                          class="{{ request()->is('category') ? 'nav-link active' : 'nav-link' }}">
                          <i class="nav-icon fas fa-shapes"></i>
                          <p>
                              Data Kategori
                          </p>
                      </a>
                  </li>
                  @endif
                  @endif
                  <!-- Pesanan Pelanggan -->
                  @if (Auth::check())
                    @if (Auth::user()->roles == 'admin' || Auth::user()->roles == 'cashier' || Auth::user()->roles == 'owner')
                  <li class="nav-item">
                      <a href="{{ route('pesanan-pelanggan.index') }}"
                          class="{{ request()->is('pesanan-pelanggan') ? 'nav-link active' : 'nav-link' }}">
                          <i class="nav-icon fas fa-comment-dots"></i>
                          <p>
                              Pesanan Pelanggan
                          </p>
                      </a>
                  </li>
                  @endif
                  @endif
                  <!-- Laporan Penjualan -->
                  @if (Auth::check())
                    @if (Auth::user()->roles == 'admin' || Auth::user()->roles == 'cashier' || Auth::user()->roles == 'owner')
                  <li class="nav-item">
                      <a href="{{ route('laporan-penjualan.index') }}"
                          class="{{ request()->is('laporan-penjualan') ? 'nav-link active' : 'nav-link' }}">
                          <i class="nav-icon fa fa-book" aria-hidden="true"></i>
                          <p>
                              Laporan Penjualan
                          </p>
                      </a>
                  </li>
                  @endif
                  @endif
                  <!-- Cashier -->
                  @if (Auth::check())
                     @if (Auth::user()->roles == 'admin' || Auth::user()->roles == 'owner')
                  <li class="nav-item">
                      <a href="{{ route('cashier.index') }}"
                          class="{{ request()->is('cashier') ? 'nav-link active' : 'nav-link' }}">
                          <i class="nav-icon fas fa-edit"></i>
                          <p>
                              Data Kasir
                          </p>
                      </a>
                  </li>
                  @endif
                  @endif
                  <!-- Meja -->
                  @if (Auth::check())
                    @if (Auth::user()->roles == 'admin' || Auth::user()->roles == 'cashier' || Auth::user()->roles == 'owner')
                  <li class="nav-item">
                      <a href="{{ route('meja.index') }}"
                          class="{{ request()->is('meja') ? 'nav-link active' : 'nav-link' }}">
                          <i class="nav-icon fa fa-table" aria-hidden="true"></i>
                          <p>
                              Data Meja
                          </p>
                      </a>
                  </li>
                  @endif
                  @endif
                  <!-- order -->
                  <li class="nav-item">
                      <a href="{{ route('order.index') }}"
                          class="{{ request()->is('order') ? 'nav-link active' : 'nav-link' }}">
                          <i class="nav-icon fa fa-shopping-cart" aria-hidden="true"></i>
                          <p>
                              Pesanan
                          </p>
                      </a>
                  </li>
                  <!-- order -->
                  @if (Auth::check())
                    @if (Auth::user()->roles == 'admin' || Auth::user()->roles == 'owner')
                  <li class="nav-item">
                      <a href="{{ route('user.index') }}"
                          class="{{ request()->is('user') ? 'nav-link active' : 'nav-link' }}">
                          <i class="nav-icon fas fa-user"></i>
                          <p>
                              User
                          </p>
                      </a>
                  </li>
                  @endif
                  @endif
                  @if (Auth::check())
                    @if (Auth::user()->roles == 'admin' || Auth::user()->roles == 'cashier' || Auth::user()->roles == 'owner')
                  <li class="nav-item">
                      <a href="{{ route('logout') }}" class="nav-link"
                          onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                          <i class="fas fa-sign-out-alt nav-icon"></i>
                          <p>Logout</p>
                      </a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                          @csrf
                      </form>
                  </li>
                  @endif
                  @endif
              </ul>
          </nav>
      </div>
      <!-- /.sidebar -->
  </aside>
