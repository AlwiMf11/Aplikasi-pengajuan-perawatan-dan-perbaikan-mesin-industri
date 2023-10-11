<div class="sidebar" data-color="orange" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <script href="{{ url('/assets/fontawesome/js/all.js') }}" rel="stylesheet"> </script>
  <div class="logo">
    <a href="https://creative-tim.com/" class="simple-text logo-normal">
      {{ __('Sistem Pendataan Mesin') }}
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      @if(Auth::user()->level == 'Admin')
      <li class="nav-item{{ str_contains(url()->current(),'/dashboard/admin') ? ' active' : '' }}">
        <a class="nav-link" href="/dashboard/admin">
          <i class="material-icons">dashboard</i>
            <p>{{ __('Dashboard') }}</p>
        </a>
      </li>
      @elseif(Auth::user()->level == 'Teknisi')
      <li class="nav-item{{ str_contains(url()->current(),'/dashboard/teknisi') ? ' active' : '' }}">
        <a class="nav-link" href="/dashboard/teknisi">
          <i class="material-icons">dashboard</i>
            <p>{{ __('Dashboard') }}</p>
        </a>
      </li>
      @else
      <li class="nav-item{{ Request::url() =='dashboard/user' ? ' active' : '' }}">
        <a class="nav-link" href="/dashboard/user">
          <i class="material-icons">dashboard</i>
            <p>{{ __('Dashboard') }}</p>
        </a>
      </li>
      @endif
      
      @if(Auth::user()->level == 'Admin')
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#laravelExample" aria-expanded="false">
          <i class="fas fa-users"></i>
          <p>Data User
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse" id="laravelExample">
          <ul class="nav">
            <li class="nav-item{{ str_contains(url()->current(),'/user') ? ' active:' : '' }}">
              <a class="nav-link" href="/user">
                <span class="sidebar-mini"> U </span>
                <span class="sidebar-normal">User</span>
              </a>
            </li>
            
            <li class="nav-item{{ str_contains(url()->current(),'/admin') ? ' active:' : '' }}">
              <a class="nav-link" href="/admin">
                <span class="sidebar-mini"> A </span>
                <span class="sidebar-normal">Admin</span>
              </a>
            </li>
            
            <li class="nav-item{{ str_contains(url()->current(),'/teknisi') ? ' active:' : '' }}">
              <a class="nav-link" href="/teknisi">
                <span class="sidebar-mini"> T </span>
                <span class="sidebar-normal">Teknisi</span>
              </a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#laravelExample2" aria-expanded="false">
          <i class="fas fa-book"></i>
          <p>Data Master
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse" id="laravelExample2">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'user-management' }}">
              <a class="nav-link" href="/mesin">
                <span class="sidebar-mini"> M </span>
                <span class="sidebar-normal"> Mesin </span>
              </a>
            </li>
            
            <li class="nav-item{{ $activePage == 'user-management' }}">
              <a class="nav-link" href="/divisi">
                <span class="sidebar-mini"> D </span>
                <span class="sidebar-normal"> Divisi </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'user-management' }}">
              <a class="nav-link" href="/tahun">
                <span class="sidebar-mini"> T </span>
                <span class="sidebar-normal"> Tahun Pembuatan </span>
              </a>
            </li>
            
            <li class="nav-item{{ $activePage == 'user-management' }}">
              <a class="nav-link" href="/periode">
                <span class="sidebar-mini"> P </span>
                <span class="sidebar-normal"> Periode Pakai </span>
              </a>
            </li>
            
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#laravelExample3" aria-expanded="false">
          <i class="fas fa-list"></i>
          <p>Transaksi
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse" id="laravelExample3">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'user-management' }}">
              <a class="nav-link" href="/transaksi/perawatan">
                <span class="sidebar-mini"> M </span>
                <span class="sidebar-normal"> Maintenance </span>
              </a>
            </li>
            
            <li class="nav-item{{ $activePage == 'user-management' }}">
              <a class="nav-link" href="/transaksi/perbaikan">
                <span class="sidebar-mini"> P </span>
                <span class="sidebar-normal"> Perbaikan </span>
              </a>
            </li>
          
          </ul>
        </div>
      </li>
      <li class="nav-item{{ $activePage == 'table' ? ' active' : '' }}">
        <a class="nav-link" href="/permintaan/perbaikan">
          <i class="fas fa-edit"></i>
            <p>Permintaan Perbaikan</p>
        </a>
      </li>
      
      <li class="nav-item{{ $activePage == 'table' ? ' active' : '' }}">
        <a class="nav-link" href="/permintaan/perawatan">
          <i class="fas fa-paper-plane"></i>
            <p>Permintaan Perawatan</p>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#laravelExample5" aria-expanded="false">
          <i class="fas fa-book"></i>
          <p>Data Laporan
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse" id="laravelExample5">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'user-management' }}">
              <a class="nav-link" href="/kartu/riwayat/mesin">
                <span class="sidebar-mini"> K </span>
                <span class="sidebar-normal"> Kartu Riwayat Mesin </span>
              </a>
            </li>
            
            <li class="nav-item{{ $activePage == 'user-management' }}">
              <a class="nav-link" href="/laporan/perbaikan">
                <span class="sidebar-mini"> P </span>
                <span class="sidebar-normal"> Laporan Perbaikan </span>
              </a>
            </li>
            
            <li class="nav-item{{ $activePage == 'user-management' }}">
              <a class="nav-link" href="/laporan/perawatan">
                <span class="sidebar-mini"> M </span>
                <span class="sidebar-normal"> Laporan Maintenance </span>
              </a>
            </li>
            
          </ul>
        </div>
      </li>
      @elseif(Auth::user()->level == 'Teknisi')
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#laravelExample3" aria-expanded="false">
          <i class="fas fa-list"></i>
          <p>Transaksi
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse" id="laravelExample3">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'user-management' }}">
              <a class="nav-link" href="/transaksi/perawatan">
                <span class="sidebar-mini"> M </span>
                <span class="sidebar-normal"> Maintenance </span>
              </a>
            </li>
            
            <li class="nav-item{{ $activePage == 'user-management' }}">
              <a class="nav-link" href="/transaksi/perbaikan">
                <span class="sidebar-mini"> P </span>
                <span class="sidebar-normal"> Perbaikan </span>
              </a>
            </li>
          
          </ul>
        </div>
      </li>
      <li class="nav-item{{ $activePage == 'table' ? ' active' : '' }}">
        <a class="nav-link" href="/permintaan/perbaikan">
          <i class="fas fa-edit"></i>
            <p>Permintaan Perbaikan</p>
        </a>
      </li>
      
      <li class="nav-item{{ $activePage == 'table' ? ' active' : '' }}">
        <a class="nav-link" href="/permintaan/perawatan">
          <i class="fas fa-paper-plane"></i>
            <p>Permintaan Perawatan</p>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#laravelExample5" aria-expanded="false">
          <i class="fas fa-book"></i>
          <p>Data Laporan
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse" id="laravelExample5">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'user-management' }}">
              <a class="nav-link" href="/kartu/riwayat/mesin">
                <span class="sidebar-mini"> K </span>
                <span class="sidebar-normal"> Kartu Riwayat Mesin </span>
              </a>
            </li>
            
            <li class="nav-item{{ $activePage == 'user-management' }}">
              <a class="nav-link" href="/laporan/perbaikan">
                <span class="sidebar-mini"> P </span>
                <span class="sidebar-normal"> Laporan Perbaikan </span>
              </a>
            </li>
            
            <li class="nav-item{{ $activePage == 'user-management' }}">
              <a class="nav-link" href="/laporan/perawatan">
                <span class="sidebar-mini"> M </span>
                <span class="sidebar-normal"> Laporan Maintenance </span>
              </a>
            </li>
            
          </ul>
        </div>
      </li>
      @else
      <li class="nav-item{{ $activePage == 'table' ? ' active' : '' }}">
        <a class="nav-link" href="/user/permintaan/perbaikan">
          <i class="fas fa-edit"></i>
            <p>Permintaan Perbaikan</p>
        </a>
      </li>
      
      <li class="nav-item{{ $activePage == 'table' ? ' active' : '' }}">
        <a class="nav-link" href="/user/permintaan/perawatan">
          <i class="fas fa-paper-plane"></i>
            <p>Permintaan Perawatan</p>
        </a>
      </li>
      @endif
    </ul>
  </div>
</div>
