<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <li class="nav-item">
            <a href="{{ route('dashboard.index') }}" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Menu Utama</p>
            </a>
        </li>
       
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>Bebas Pustaka <i class="right fas fa-angle-left"></i></p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('bebaspustaka.diproses') }}" class="nav-link">
                         &nbsp;&nbsp;&nbsp; <i class="fa fa-book nav-icon"></i>
                        <p>Diproses / Baru</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('bebaspustaka.perbaikan') }}" class="nav-link">
                        &nbsp;&nbsp;&nbsp; <i class="fa fa-edit nav-icon"></i>
                        <p>Perbaikan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('bebaspustaka.diterima') }}" class="nav-link">
                        &nbsp;&nbsp;&nbsp; <i class="fa fa-check nav-icon"></i>
                        <p>Diterima</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="{{ route('mahasiswa.index') }}" class="nav-link">
                <i class="fas fa-users nav-icon"></i>
                <p>Mahasiswa</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('prodi.index') }}" class="nav-link">
                <i class="fas fa-file nav-icon"></i>
                <p>Prodi</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.index') }}" class="nav-link">
                <i class="fas fa-user nav-icon"></i>
                <p>Pengguna</p>
            </a>
        </li>
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-print"></i>
                <p>Laporan <i class="right fas fa-angle-left"></i></p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('laporan.perbulan') }}" class="nav-link">
                        &nbsp;&nbsp;&nbsp; <i class="fa fa-print nav-icon"></i>
                        <p>Perbulan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('laporan.pertriwulan') }}" class="nav-link">
                        &nbsp;&nbsp;&nbsp; <i class="fa fa-print nav-icon"></i>
                        <p>Pertriwulan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('laporan.pertahun') }}" class="nav-link">
                        &nbsp;&nbsp;&nbsp; <i class="fa fa-print nav-icon"></i>
                        <p>Pertahun</p>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</nav>
