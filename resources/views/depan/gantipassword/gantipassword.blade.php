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
                        

                        <h1 class="fw-bolder mb-3">Ganti Password</h1>
                        <div class="alert alert-warning">
                            <ul>
                                <li>Gunakan password yang panjang dan mudah diingat</li>
                                <li>Kombinasikan password tersebut huruf, angka dan simbol</li>
                            </ul>
                        </div>
                        <form method="POST" action="{{ route('mahasiswa.gantipassword.form.proses') }}">
                            @csrf

                            <div class="form-floating mb-3">
                                <input class="form-control" name="plama" type="password"
                                    placeholder="Masukan Password..." />
                                <label>Kata Sandi / Password Lama</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" name="pbaru" type="password"
                                    placeholder="Masukan Password..." />
                                <label>Kata Sandi / Password Baru</label>
                            </div>
                            <div class="d-grid"><button class="btn btn-primary btn-lg" type="submit">Simpan</button></div>
                        </form>
                    </div>
                    <div class="col-lg-7 col-xl-7 py-5 px-3 text-center xbg-light">
                        {{-- <img class="img-fluid" src="{{ url('depan/gambar/team.svg') }}" /> --}}
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
