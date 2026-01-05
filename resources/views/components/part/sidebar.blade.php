<div class="deznav">
  <div class="deznav-scroll">
    <ul class="metismenu" id="menu">
      <li class="px-4 py-2 mt-2 mb-2">
        <h4 class="fw-bold nav-text">Home</h4>
      </li>
      <li>
        <a href="{{ route(auth()->user()->role . '.dashboard') }}" aria-expanded="false">
          <i class="fa-regular fa-building-columns fw-bold"></i>
          <span class="nav-text">Dashboard</span>
        </a>
      </li>
      @if (auth()->user()->role == 'teller' || auth()->user()->role == 'admin')
        <li class="px-4 pt-4 mt-4 border-top border-primary">
          <h4 class="fw-bold nav-text">Service</h4>
        </li>
        <li>
          <a href="{{ route('rekening.index') }}" aria-expanded="false">
            <i class="flaticon-381-notepad"></i>
            <span class="nav-text">Rekening</span>
          </a>
        </li>
        <li>
          <a href="/tabungan" aria-expanded="false">
            <i class="flaticon-381-layer-1"></i>
            <span class="nav-text">Tabungan</span>
          </a>
        </li>
        <li>
          <a href="/pinjaman" aria-expanded="false">
            <i class="flaticon-381-network"></i>
            <span class="nav-text">Pinjaman</span>
          </a>
        </li>
        <li>
          <a href="/pegadaian" aria-expanded="false">
            <i class="flaticon-381-television"></i>
            <span class="nav-text">Gadai</span>
          </a>
        </li>
      @endif
      @if (auth()->user()->role == 'admin' || auth()->user()->role == 'operator')
        <li class="px-4 pt-4 mt-4 border-top border-primary">
          <h4 class="fw-bold nav-text">Menu</h4>
        </li>
        <li>
          <a href="/kategori" aria-expanded="false">
            <i class="flaticon-381-notepad"></i>
            <span class="nav-text">Jenis Simpanan</span>
          </a>
        </li>
        <li>
          <a href="/profile" aria-expanded="false">
            <i class="flaticon-381-network"></i>
            <span class="nav-text">Cabang</span>
          </a>
        </li>
        <li>
          <a href="/customer-service" aria-expanded="false">
            <i class="fa-regular fa-users fw-bold"></i>
            <span class="nav-text">Customer Service</span>
          </a>
        </li>
        <li class="px-4 pt-4 mt-4 border-top border-primary">
          <h4 class="fw-bold nav-text">Laporan</h4>
        </li>
        <li>
          <a href="/tabungan/laporan" aria-expanded="false">
            <i class="flaticon-381-layer-1"></i>
            <span class="nav-text">Tabungan</span>
          </a>
        </li>
        <li>
          <a href="/pinjaman/laporan" aria-expanded="false">
            <i class="flaticon-381-network"></i>
            <span class="nav-text">Pinjaman</span>
          </a>
        </li>
        <li>
          <a href="/pegadaian/laporan" aria-expanded="false">
            <i class="flaticon-381-television"></i>
            <span class="nav-text">Gadai</span>
          </a>
        </li>
      @endif

      @if (auth()->user()->role == 'anggota')
        <li class="px-4 pt-4 mt-4 border-top border-primary">
          <h4 class="fw-bold nav-text">Rekapitulasi</h4>
        </li>
        <li>
          <a href="/tabungan/rekap" aria-expanded="false">
            <i class="flaticon-381-layer-1"></i>
            <span class="nav-text">Tabungan</span>
          </a>
        </li>
        <li>
          <a href="/pinjaman/rekap" aria-expanded="false">
            <i class="flaticon-381-network"></i>
            <span class="nav-text">Pinjaman</span>
          </a>
        </li>
        <li>
          <a href="/pegadaian/rekap" aria-expanded="false">
            <i class="flaticon-381-television"></i>
            <span class="nav-text">Gadai</span>
          </a>
        </li>
      @endif

      <li class="px-4 pt-4 mt-4 border-top border-primary">
        <h4 class="fw-bold nav-text">Settings</h4>
      </li>
      <li>
        <a href="/settings" aria-expanded="false">
          <i class="fa-regular fa-gear fw-bold"></i>
          <span class="nav-text">Setting</span>
        </a>
      </li>
    </ul>

    <div class="d-grid px-4 mt-3 text-center">
      <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button class="btn btn-primary px-5 nav-text">Logout</button>
      </form>
    </div>

    <div class="copyright">
      <p>© 2024 All Rights Reserved</p>
      <p>Made with <span class="heart"></span> by TurboMain</p>
    </div>
  </div>
</div>
