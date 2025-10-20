
<nav class="navbar navbar-expand-lg navbar-dark xbg-dark navcustom">
    <div class="container px-5">
        <a class="navbar-brand" href="{{ route('web.depan') }}">{{ \Info::nama() }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span
                class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="{{ route('web.depan') }}">Beranda</a></li>
                {{-- <li class="nav-item"><a class="nav-link" href="{{ route('web.depan') }}">Penggunaan Aplikasi</a></li> --}}
                @php
                    $auth = Auth::guard('mahasiswa');
                @endphp

                @if ($auth->check())
                    <li class="nav-item"><a class="nav-link" href="{{ route('mahasiswa.form.bebaspustaka') }}">Bebas
                            Pustaka</a></li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownPortfolio" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">{{ $auth->user()->nama }}</a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownPortfolio">
                            <li><a class="dropdown-item" href="{{ route('mahasiswa.profilsaya') }}">Profil Saya</a></li>
                            <li><a class="dropdown-item" href="{{ route('mahasiswa.gantipassword.form') }}">Ganti
                                    Password</a></li>
                            <li><a class="dropdown-item" href="{{ route('logout.proses') }}">Keluar / Logout</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
