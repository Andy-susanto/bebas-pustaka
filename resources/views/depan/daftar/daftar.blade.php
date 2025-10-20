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
                            <li>Pastikan Nama, NIM dan Prodi anda sesuai data pada SIAKAD</li>
                            <li>Password pada saat melakukan pendaftaran ini digunakan untuk Login</li>
                        </ul>
                    </div>
                    <div class="col-lg-5 col-xl-5 bg-light rounded-3 py-3 px-3">
                        <h1 class="fw-bolder mb-3">Daftar</h1>
                        <form method="POST" action="{{ route('save.daftar') }}" autocomplete="off">
                            @csrf
                            <div class="form-floating mb-3">
                                {{-- <input class="form-control" name="nama" type="text"
                                    placeholder="Masukan Nama lengkap..." /> --}}
                                {{ Form::text('nama', '', ['class' => 'form-control ' . ($errors->has('nama') ? 'is-invalid' : ''), 'placeholder' => 'Nama',]) }}
                                <label>Nama</label>
                                @error('nama')
                                    <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-floating mb-3">
                                {{-- <input class="form-control" name="nim" type="number" placeholder="Masukan NIM..."
                                    data-sb-validations="required" /> --}}
                                {{ Form::text('nim', '', ['class' => 'form-control ' . ($errors->has('nim') ? 'is-invalid' : ''), 'placeholder' => 'NIM',]) }}
                                <label>NIM</label>
                                @error('nim')
                                    <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-floating mb-3">
                                {{-- <input class="form-control" name="password" type="password"
                                    placeholder="Masukan Password..." /> --}}
                                {{ Form::password('password', ['class' => 'form-control ' . ($errors->has('password') ? 'is-invalid' : ''), 'placeholder' => 'Kata Sandi / Password',]) }}
                                
                                <label>Kata Sandi / Password</label>
                                @error('password')
                                    <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-floating mb-3">

                                {{ Form::select('prodi_id',$prodi,'', ['class' => 'form-control ' . ($errors->has('prodi_id') ? 'is-invalid' : ''), 'placeholder' => 'Pilih Prodi...',]) }}
                               
                                <label>Prodi</label>
                                @error('prodi_id')
                                    <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="d-grid"><button class="btn btn-primary btn-lg" type="submit">Daftar</button></div>
                            <p class="mt-5 text-center">Sudah punya akun klik <a href="{{ route('login.form') }}">Masuk/Login disini</a></p>
                        </form>
                    </div>
                    <div class="col-lg-7 col-xl-7 py-5 px-3 text-center xbg-light">
                        <img class="img-fluid" src="{{ url('depan/gambar/team.svg') }}" />
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
