<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-2">
    <!-- Brand Logo -->
    <a href="/dashboard" class="brand-link">
      <img src="{{ asset('img/bina-logo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-2" style="opacity: 0.8">
      <span class="brand-text font-weight-bold">Marketplace</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ url('img/image_profile/'. $session->picture ) }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ $session->adm_name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->


          {{-- Menu Dashboard --}}
          <li class="nav-item">
            <a href="/dashboard" class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          @if ($session->role_id == 1)

          <li class="nav-header"><b>ADMINISTRATOR</b></li>

          {{-- Menu Category --}}
          <li class="nav-item">
            <a href="/category" class="nav-link {{ Request::is('category') ? 'active' : '' }}">
              <i class="fas fa-clone nav-icon"></i>
              <p>
                Category
              </p>
            </a>
          </li>

          {{-- Shiping --}}
          <li class="nav-item">
            <a href="/shipping" class="nav-link {{ Request::is('shipping') ? 'active' : '' }}">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
                Shiping
              </p>
            </a>
          </li>

          {{-- Orders --}}
          <li class="nav-item">
            <a href="/orders" class="nav-link {{ ($title == "Orders") ? 'active' : '' }}">
              <i class="nav-icon fas fa-list-ul"></i>
              <p>
                Orders
              </p>
            </a>
          </li>

          {{-- payment --}}
          <li class="nav-item">
            <a href="/payment" class="nav-link {{ Request::is('payment') ? 'active' : '' }}">
              <i class="nav-icon fas fa-credit-card"></i>
              <p>
                Payment
              </p>
            </a>
          </li>

          {{-- members --}}
          <li class="nav-item">
            <a href="/members" class="nav-link {{ Request::is('members') ? 'active' : '' }}">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Member
              </p>
            </a>
          </li>

          {{-- city & province --}}
          <li class="nav-item">
            <a href="/city" class="nav-link {{ Request::is('city') ? 'active' : '' }}">
              <i class="nav-icon fas fa-city"></i>
              <p>
                City & Province
              </p>
            </a>
          </li>

          {{-- consultant --}}
          <li class="nav-item">
            <a href="/consultant" class="nav-link {{ Request::is('consultant') ? 'active' : '' }}">
              <i class="nav-icon fas fa-user-tie"></i>
              <p>
                Consultant
              </p>
            </a>
          </li>

          {{-- builder --}}
          <li class="nav-item">
            <a href="/builder" class="nav-link {{ Request::is('builder') ? 'active' : '' }}">
              <i class="nav-icon fas fa-users-cog"></i>
              <p>
                Builder
              </p>
            </a>
          </li>

          {{-- users --}}
          <li class="nav-item">
            <a href="/users" class="nav-link {{ Request::is('users') ? 'active' : '' }}">
              <i class="nav-icon fas fa-portrait"></i>
              <p>
                Users
              </p>
            </a>
          </li>

          {{-- retail --}}
          <li class="nav-item {{ ($title === "Retail") ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ ($title === "Retail") ? 'active' : '' }}">
              <i class="nav-icon fas fa-store-alt"></i>
              <p>
                Retail
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/retail" class="nav-link {{ (request()->is('retail')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/retail/aktif" class="nav-link {{ (request()->is('retail/aktif')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Aktif</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/retail/reject" class="nav-link {{ (request()->is('retail/reject')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Rejected</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/retail/review" class="nav-link {{ (request()->is('retail/review')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Perlu Persetujuan</p>
                </a>
              </li>
            </ul>
          </li>

          {{-- chat --}}
          <li class="nav-item">
            <a href="/chat" class="nav-link {{ (request()->is('chat')) ? 'active' : '' }}">
              <i class="far fa-comment-alt nav-icon"></i>
              <p>
                Chat
              </p>
            </a>
          </li>

          {{-- laporan --}}
          <li class="nav-item {{ ($title === "Laporan") ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ ($title === "Laporan") ? 'active' : '' }}">
              <i class="nav-icon fas fa-store-alt"></i>
              <p>
                Laporan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/laporan" class="nav-link {{ (request()->is('laporan')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard Laporan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/laporan/penjualan" class="nav-link {{ (request()->is('laporan/penjualan')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Laporan Penjualan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/laporan/terbanyak" class="nav-link {{ (request()->is('laporan/terbanyak')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Penjualan Terbanyak</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/laporan/periode" class="nav-link {{ (request()->is('laporan/periode')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Periode Penjualan</p>
                </a>
              </li>
            </ul>
          </li>

          @elseif($session->role_id == 2)

          <li class="nav-header"><b>CUSTOMER SERVICE</b></li>

          {{-- Menu Category --}}
          <li class="nav-item">
            <a href="/category" class="nav-link {{ Request::is('category') ? 'active' : '' }}">
              <i class="fas fa-clone nav-icon"></i>
              <p>
                Category
              </p>
            </a>
          </li>

          {{-- Shiping --}}
          <li class="nav-item">
            <a href="/shipping" class="nav-link {{ Request::is('shipping') ? 'active' : '' }}">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
                Shiping
              </p>
            </a>
          </li>

          {{-- Orders --}}
          <li class="nav-item">
            <a href="/orders" class="nav-link {{ ($title == "Orders") ? 'active' : '' }}">
              <i class="nav-icon fas fa-list-ul"></i>
              <p>
                Orders
              </p>
            </a>
          </li>
          {{-- retail --}}
          <li class="nav-item {{ ($title === "Retail") ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ ($title === "Retail") ? 'active' : '' }}">
              <i class="nav-icon fas fa-store-alt"></i>
              <p>
                Retail
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/retail" class="nav-link {{ (request()->is('retail')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/retail/aktif" class="nav-link {{ (request()->is('retail/aktif')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Aktif</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/retail/reject" class="nav-link {{ (request()->is('retail/reject')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Rejected</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/retail/review" class="nav-link {{ (request()->is('retail/review')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Perlu Persetujuan</p>
                </a>
              </li>
            </ul>
          </li>

          {{-- chat --}}
          <li class="nav-item">
            <a href="/chat" class="nav-link {{ (request()->is('chat')) ? 'active' : '' }}">
              <i class="far fa-comment-alt nav-icon"></i>
              <p>
                Chat
              </p>
            </a>
          </li>

          {{-- laporan --}}
          <li class="nav-item {{ ($title === "Laporan") ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ ($title === "Laporan") ? 'active' : '' }}">
              <i class="nav-icon fas fa-store-alt"></i>
              <p>
                Laporan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/laporan" class="nav-link {{ (request()->is('laporan')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard Laporan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/laporan/penjualan" class="nav-link {{ (request()->is('laporan/penjualan')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Laporan Penjualan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/laporan/terbanyak" class="nav-link {{ (request()->is('laporan/terbanyak')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Penjualan Terbanyak</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/laporan/periode" class="nav-link {{ (request()->is('laporan/periode')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Periode Penjualan</p>
                </a>
              </li>
            </ul>
          </li>
          @elseif($session->role_id == 3)

          <li class="nav-header"><b>PIMPINAN</b></li>
          {{-- laporan --}}
          <li class="nav-item {{ ($title === "Laporan") ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ ($title === "Laporan") ? 'active' : '' }}">
              <i class="nav-icon fas fa-store-alt"></i>
              <p>
                Laporan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/laporan" class="nav-link {{ (request()->is('laporan')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard Laporan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/laporan/penjualan" class="nav-link {{ (request()->is('laporan/penjualan')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Laporan Penjualan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/laporan/terbanyak" class="nav-link {{ (request()->is('laporan/terbanyak')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Penjualan Terbanyak</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/laporan/periode" class="nav-link {{ (request()->is('laporan/periode')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Periode Penjualan</p>
                </a>
              </li>
            </ul>
          </li>
          @endif

          <li class="nav-header"><b>USER</b></li>

          {{-- profile --}}
          <li class="nav-item">
            <a href="/profile" class="nav-link {{ Request::is('profile') ? 'active' : '' }}">
              <i class="far fa-user nav-icon"></i>
              <p>
                Profile
              </p>
            </a>
          </li>

          {{-- logout --}}
          <li class="nav-item">
            <a href="#" class="nav-link" data-toggle="modal" data-target="#modalLogout">
              <i class="fas fa-sign-out-alt"></i> 
              <p>
                Logout
              </p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>


    <!-- Modal Logout -->
    <div class="modal fade" id="modalLogout" tabindex="-1" aria-labelledby="modalLogoutLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalLogoutLabel">Konfirmasi Logout</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="/logout" method="post">
              @csrf
            <p>Apakah anda yakin ingin keluar dari sistem..?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Logout</button>
          </form>
          </div>
        </div>
      </div>
    </div>