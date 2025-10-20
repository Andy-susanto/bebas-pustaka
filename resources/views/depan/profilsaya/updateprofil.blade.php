@extends('depan.layouts.depanapp')

@section('content')
    <section class="py-1">
        <div class="container px-5">

            <!-- Contact form-->
            <div class="xbg-light rounded-3 py-5 px-4 xpx-md-5 mb-5">

                <div class="row gx-5 xjustify-content-center">

                    <div class="col-lg-3"></div>
                    <div class="col-lg-6 col-xl-6 bg-light rounded-3 py-3 px-3">
                        <h1 class="fw-bolder mb-3">Ubah Profil Saya</h1>
                        <form method="POST" action="{{ route('mahasiswa.ubahprofilsayasave') }}">
                            @csrf
                            <div class="form-floating mb-3">
                                {{ Form::text('nama', $mahasiswa->nama, ['class' => 'form-control', 'required']) }}
                                <label>Nama</label>
                            </div>
                            <div class="form-floating mb-3">
                                {{ Form::number('nim', $mahasiswa->nim, ['class' => 'form-control', 'required']) }}
                                <label>NIM</label>
                            </div>
                            <div class="form-floating mb-3">
                                {{ Form::select('prodi_id',$prodi,$mahasiswa->prodi_id,['class' => 'form-control','required'])}}
                                <label>Prodi</label>
                            </div>
                            <div class="form-floating mb-3">
                                {{ Form::text('alamat', $mahasiswa->alamat, ['class' => 'form-control', 'required']) }}
                                <label>Alamat</label>
                            </div>
                            <div class="form-floating mb-3">
                                {{ Form::text('notelp', $mahasiswa->notelp, ['class' => 'form-control', 'required']) }}
                                <label>No Telp</label>
                            </div>
                            <button class="btn btn-success">Simpan Profil</button>
                        </form>
                    </div>

                </div>
            </div>

        </div>
    </section>
@endsection
