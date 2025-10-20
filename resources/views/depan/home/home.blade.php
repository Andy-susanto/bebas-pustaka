@extends('depan.layouts.depanapp')

@section('content')

    <!-- Header-->
    <header class="bg-dark py-5" style="background: url('{{ url('depan/gambar/header.png') }}');background-size:cover">
        <div class="container px-5">
            @include('depan.layouts.flash')
            <div class="row gx-5 align-items-center justify-content-center">
                <div class="col-lg-12 col-xl-12 col-xxl-6">
                    <div class="my-5 text-center text-xl-start">
                        <h1 class="display-5 fw-bolder text-white mb-2">Pelayanan Bebas Pustaka FEBI UIN STS Jambi</h1>
                        <p class="lead fw-normal text-white-50 mb-4">Pelayanan menjadi cepat dan mudah diakses dari manapun,
                            pelayanan cepat adalah komitmen kami</p>
                        <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                            @php
                                $auth = Auth::guard('mahasiswa');
                            @endphp

                            @if ($auth->check())
                                <a class="btn btn-primary btn-lg px-4 me-sm-3"
                                    href="{{ route('mahasiswa.form.bebaspustaka') }}">Bebas
                                    Pustaka</a>
                            @else
                                <a class="btn btn-primary btn-lg px-4 me-sm-3" href="{{ route('login.form') }}">Login</a>
                                <a class="btn btn-outline-light btn-lg px-4" href="{{ route('daftar.form') }}">Daftar</a>
                            @endif

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </header>
    <!-- Features section-->

    <div class="container px-5 mt-5">
        <h2 class="pb-2 border-bottom">Proses Bebas Pustaka</h2>
        <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
            <div class="col d-flex align-items-start">
                <div
                    class="icon-square text-body-emphasis bg-body-secondary d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">
                   <i class="fa fa-user-plus fa-2x text-primary"></i>
                </div>
                <div>
                    <h3 class="fs-2 text-body-emphasis">Daftar / Login</h3>
                    <p>
                        Isi data dengan lengkap pada form inputan pendaftaran, data yang di inputkan harus sama dengan data pada siakad(Seperti Nama, Nim, Prodi/Jurusan).
                        Gunakan NIM dan password yang telah diinputkan pada saat melakukan pendaftaran ke dalam form login untuk melakukan login.
                    </p>
                </div>
            </div>
            <div class="col d-flex align-items-start">
                <div
                    class="icon-square text-body-emphasis bg-body-secondary d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">
                    <i class="fa fa-edit fa-2x text-primary"></i>
                </div>
                <div>
                    <h3 class="fs-2 text-body-emphasis">Pengisian Data</h3>
                    <p>
                        Pada saat melakukan pengisi data. Lihat petunjuk pengisian data pada halaman form inputan bebas pustaka, pastikan data yang di inputkan sesuai (seperti Semester dll).
                        File yang di upload harus memenuhi standar pada form inputan (misalnya Ukuran file yang di upload)
                    </p>
                </div>
            </div>
            <div class="col d-flex align-items-start">
                <div
                    class="icon-square text-body-emphasis bg-body-secondary d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">
                     <i class="fa fa-print fa-2x text-primary"></i>
                </div>
                <div>
                    <h3 class="fs-2 text-body-emphasis">Cetak</h3>
                    <p>
                        Pencetakan surat keterangan data bebas pustaka dapat dilakukan apabila data anda telah di verifikasi oleh admin dan data tersebut sudah sesuai dengan ketentuan yang berlaku pada Perpustakaan Fakultas Ekonomi dan Bisnis Islam (FEBI) UIN STS Jambi
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="container px-5 my-5">
             <h2 class="border-bottom my-5">Alur Proses Bebas Pustaka</h2>
            <div class="row gx-5">
                <div class="col-lg-12 mb-3 ">
                    <img src="{{ url('depan/gambar/alur.png') }}" class="img-fluid" width="100%">

                </div>
            </div>
        </div>

    <section class="py-5" xid="features">
        
    </section>
@endsection
