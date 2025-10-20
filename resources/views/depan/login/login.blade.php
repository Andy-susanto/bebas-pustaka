@extends('depan.layouts.depanapp')

@section('content')
    <section class="py-1">
        <div class="container px-5">
            <!-- Contact form-->
            <div class="xbg-light rounded-3 py-5 px-4 xpx-md-5 mb-5">
               
                <div class="row gx-5 xjustify-content-center">
                    @include('depan.layouts.flash')
                    <div class="alert alert-warning">
                        <ul>
                            <li>Masukan NIM dan Password yang benar</li>
                            <li>Apabila gagal login harap hubungi admin</li>
                        </ul>
                    </div>
                    <div class="col-lg-5 col-xl-5 bg-light rounded-3 py-3 px-3">
                        <h1 class="fw-bolder mb-3">Masuk / Login</h1>
                        <form method="POST" action="{{ route('proses.login') }}">
                            @csrf
                           
                            <div class="form-floating mb-3">
                                <input class="form-control" name="nim" type="number" placeholder="Masukan NIM..."
                                    data-sb-validations="required" />
                                <label>NIM</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" name="password" type="password"
                                    placeholder="Masukan Password..." />
                                <label>Kata Sandi / Password</label>
                            </div>
                            
                            <div class="d-grid"><button class="btn btn-primary btn-lg" type="submit">Masuk / Login</button></div>
                            <p class="mt-5 text-center">Belum punya akun klik <a href="{{ route('daftar.form') }}">Daftar disini</a></p>
                        </form>
                    </div>
                    <div class="col-lg-7 col-xl-7 py-3 text-center xbg-light">
                        <img  src="{{ url('depan/gambar/login.svg') }}" style="width:60%;height:300px"/>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
