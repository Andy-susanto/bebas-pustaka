@extends('depan.layouts.depanapp')

@section('content')
    <section class="py-5">
        <div class="container px-5 my-5">
            <div class="text-center mb-5">
                <h1 class="fw-bolder">Bebas Pustaka</h1>
                <p class="lead fw-normal text-muted mb-0">Isi data dengan lengkap dan benar</p>
                @include('depan.layouts.flash')
            </div>
            <div class="row gx-5">

                <div class="col-xl-7">
                    @if ($bebaspustaka->statuspengajuan == 'Diproses')
                        <div class="alert alert-info">Bebas pustaka anda sedang <b>Diproses</b>,
                            cek secara berkala untuk melihat perubahan status pengajuan bebas pustaka Anda</div>
                    @elseif ($bebaspustaka->statuspengajuan == 'Perbaikan')
                        <div class="alert alert-warning">Terdapat <b>Perbaikan</b> pada berkas yang anda inputkan, harap di
                            perhatikan
                            keterangan yang pada inputan data anda. Semua inputan dapat di rubah / di upload ulang selama
                            proses dalam <b>Perbaikan</b>. Apabila perbaikan telah selesai maka klik tombol <b>Kirim Data
                                Bebas Pustaka</b> </div>
                    @elseif ($bebaspustaka->statuspengajuan == 'Diterima' && $bebaspustaka->cetaksurat == 'Non Aktif')
                        <div class="alert alert-success">
                            Status Pengajuan bebas pustaka anda telah <b>Diterima</b>. Silahkan download dan cetak bukti
                            upload anda, dengan mengklik tombol di bawah form inputan.
                        </div>
                    @elseif ($bebaspustaka->statuspengajuan == 'Diterima' && $bebaspustaka->cetaksurat == 'Aktif')
                        <div class="alert alert-success">
                            Status Pengajuan bebas pustaka anda telah <b>Diterima dan Sudah Penyerahan Berkas/Buku</b>.
                            Silahkan download dan Cetak Surat Bebas Pustaka, dengan mengklik tombol di bawah form inputan.
                        </div>
                    @endif

                    @if ($bebaspustaka->statuspengajuan == 'Diterima')
                        <div>
                            <div class="form-floating mb-3">
                                {{ Form::select('semester', $listsemester, $bebaspustaka->semester, ['class' => 'form-control', 'placeholder' => 'Pilih...', 'disabled']) }}
                                <label>Semester</label>
                            </div>
                            <div class="form-floating mb-3">
                                {{ Form::select('punyakartuperpus', ['Ya' => 'Ya', 'Tidak' => 'Tidak'], $bebaspustaka->punyakartuperpus, ['class' => 'form-control', 'placeholder' => 'Pilih...', 'disabled']) }}

                                <label>Memiliki Kartu Perpustakaan Fakultas Ekonomi dan Bisnis?</label>
                            </div>
                            <div class="form-floating mb-3">
                                {{ Form::number('nokartu', $bebaspustaka->nokartu, ['class' => 'form-control', 'placeholder' => 'Nomor kartu Anggota', 'disabled']) }}
                                <label>Nomor Kartu Anggota Pustaka</label>
                            </div>

                            <div class="mb-3">
                                <label>File Foto Kartu Anggota Pustaka FEBI</label>
                                <br>
                                <a href="{{ route('mahasiswa.view.lihatkartuanggota') }}"
                                    class="btn btn-sm btn-success">Lihat Kartu Anggota</a>
                            </div>
                            <div class="mb-3">
                                <label>File Skripsi Repository (Template UIN Jambi)</label>
                                <br>
                                <a href="{{ route('mahasiswa.view.lihatskripsi') }}" target="_blank"
                                    class="btn btn-sm btn-success">Lihat File Skripsi</a>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" name="tanggalsurat" type="date" value="{{ date('Y-m-d') }}"
                                    data-sb-validations="required" disabled />
                                <label>Tanggal Surat</label>
                            </div>
                        </div>

                        @if ($bebaspustaka->cetaksurat == 'Non Aktif')
                            <a href="{{ route('mahasiswa.cetakbuktiupload') }}" class="btn btn-info" target="_blank">Cetak
                                Bukti Upload Berkas</a>
                        @elseif($bebaspustaka->cetaksurat == 'Aktif')
                            <a href="{{ route('mahasiswa.cetaksuratbebaspustaka') }}" class="btn btn-info"
                                target="_blank">Cetak Surat Bebas Pustaka</a>
                        @endif
                    @else
                        <form action="{{ route('mahasiswa.form.bebaspustaka.proses') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-floating mb-3">
                                {{ Form::select('semester', $listsemester, $bebaspustaka->semester, ['class' => 'form-control ' . ($errors->has('semester') ? 'is-invalid' : ''), 'placeholder' => 'Pilih...']) }}
                                <label>Semester</label>
                                @error('semester')
                                    <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-floating mb-3">
                                {{ Form::select('punyakartuperpus', ['Ya' => 'Ya', 'Tidak' => 'Tidak'], $bebaspustaka->punyakartuperpus, ['class' => 'form-control ' . ($errors->has('punyakartuperpus') ? 'is-invalid' : ''), 'placeholder' => 'Pilih...']) }}

                                <label>Memiliki Kartu Perpustakaan Fakultas Ekonomi dan Bisnis?</label>
                                @error('punyakartuperpus')
                                    <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-floating mb-3">
                                {{ Form::number('nokartu', $bebaspustaka->nokartu, ['class' => 'form-control ' . ($errors->has('semester') ? 'is-invalid' : ''), 'placeholder' => 'Nomor kartu Anggota']) }}
                                <label>Nomor Kartu Anggota Pustaka</label>
                                @error('nokartu')
                                    <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label>Upload Foto Kartu Anggota Pustaka FEBI (<span style="color:red">Max. 1 Mb)</span>
                                </label>
                                {{ Form::file('filekartuanggota', ['accept' => 'image/*', 'class' => 'form-control ' . ($errors->has('filekartuanggota') ? 'is-invalid' : '')]) }}
                                @error('filekartuanggota')
                                    <div class="text text-danger mb-1 mt-1">{{ $message }}</div>
                                @enderror

                                @if ($ketkartuanggota != '' && $bebaspustaka->statuspengajuan == 'Perbaikan')
                                    <a href="{{ route('mahasiswa.view.lihatkartuanggota') }}"
                                        class="btn btn-sm btn-success mt-1">Lihat Kartu Anggota</a>
                                    <p class="alert alert-danger mt-1">{{ $ketkartuanggota }}</p>
                                @elseif($bebaspustaka->statuspengajuan == 'Diproses' || $bebaspustaka->statuspengajuan == 'Perbaikan')
                                    <a href="{{ route('mahasiswa.view.lihatkartuanggota') }}"
                                        class="btn btn-sm btn-success mt-1">Lihat Kartu Anggota</a>
                                @endif

                            </div>
                            <div class="mb-3">
                                <label>Upload Skripsi Repository (Template UIN Jambi) (<span style="color:red">Max. 5
                                        Mb)</label>

                                {{ Form::file('fileskripsi', ['accept' => 'application/pdf', 'class' => 'form-control ' . ($errors->has('fileskripsi') ? 'is-invalid' : '')]) }}
                                @error('fileskripsi')
                                    <div class="text text-danger mb-1 mt-1">{{ $message }}</div>
                                @enderror

                                @if ($ketfileskripsi != '' && $bebaspustaka->statuspengajuan == 'Perbaikan')
                                    <a href="{{ route('mahasiswa.view.lihatskripsi') }}" target="_blank"
                                        class="btn btn-sm btn-success mt-1">Lihat File Skripsi</a>
                                    <p class="alert alert-danger mt-1">{{ $ketfileskripsi }}</p>
                                @elseif($bebaspustaka->statuspengajuan == 'Diproses' || $bebaspustaka->statuspengajuan == 'Perbaikan')
                                    <a href="{{ route('mahasiswa.view.lihatskripsi') }}" target="_blank"
                                        class="btn btn-sm btn-success mt-1">Lihat File Skripsi</a>
                                @endif
                            </div>
                            <div class="form-floating mb-3">

                                {{ Form::date('tanggalsurat', $bebaspustaka->tanggalsurat == '' ? date('Y-m-d') : $bebaspustaka->tanggalsurat, ['class' => 'form-control ' . ($errors->has('tanggalsurat') ? 'is-invalid' : ''), 'placeholder' => 'Tanggal Surat']) }}
                                <label>Tanggal Surat</label>
                            </div>
                            <button class="btn btn-primary" type="submit">KIRIM DATA BEBAS PUSTAKA</button>
                        </form>
                    @endif

                </div>
                <div class="col-xl-5">
                    <div class="card border-0 bg-light xmt-xl-5">
                        <div class="card-body p-4 py-lg-5">
                            <div class="d-flex align-items-center justify-content-center">
                                <div>
                                    <div class="h6 fw-bolder text-center">Petunjuk Pengisian</div>
                                    <p class="text-muted mb-4">
                                        {!! \Info::petunjukpengisian() !!}
                                    </p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
