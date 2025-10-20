@extends('depan.layouts.depanapp')

@section('content')
    <section class="py-1">
        <div class="container px-5">

            <!-- Contact form-->
            <div class="xbg-light rounded-3 py-5 px-4 xpx-md-5 mb-5">

                <div class="row gx-5 xjustify-content-center">
                    @include('depan.layouts.flash')
                    
                    <div class="col-lg-3"></div>
                    <div class="col-lg-6 col-xl-6 bg-light rounded-3 py-3 px-3">
                        <h1 class="fw-bolder mb-3">Profil Saya</h1>
                        <form method="POST" action="">
                            @csrf
                            <div class="form-floating mb-3">
                                <input class="form-control" type="text" value="{{ $mahasiswa->nama }}" disabled />
                                <label>Nama</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" type="number" value="{{ $mahasiswa->nim }}" disabled />
                                <label>NIM</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" type="text" value="{{ $prodi->nama }}" disabled />
                                <label>Prodi</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" type="text" value="{{ $mahasiswa->alamat }}" disabled />
                                <label>Alamat</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" type="text" value="{{ $mahasiswa->notelp }}" disabled />
                                <label>No Telp</label>
                            </div>
                            <a href="{{ route('mahasiswa.ubahprofilsaya') }}" class="btn btn-success btn-block">Ubah Profil</a>
                        </form>
                    </div>
                    
                </div>
            </div>

        </div>
    </section>
@endsection
