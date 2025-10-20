@extends('adm.layouts.admlte')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header grad">
            <div class="container-fluid">

            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            @include('adm.layouts.flash')

            <div class="row">
                <div class="col-12">
                    <form action="{{ route('bebaspustaka.savediterima') }}" method="post">
                        @csrf
                        <input type="hidden" name="idbebaspustaka" value="{{ $bebaspustaka->id }}">
                        <div class="invoice p-3 mb-3 shadow">
                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <h5><i class="fa fa-book"></i> {{ $title }}</h5>
                                </div>
                                <div class="col-md-6 text-right">
                                    <a href="{{ $link }}" class="btn btn-warning btn-sm pull-right"><i
                                            class="fa fa-arrow-left"></i> Kembali</a>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-6">
                                    <table>
                                        <tr>
                                            <th width="130">Nama</th>
                                            <td width="10">:</td>
                                            <td>{{ $mahasiswa->nama }}</td>
                                        </tr>
                                        <tr>
                                            <th>NIM</th>
                                            <td>:</td>
                                            <td>{{ $mahasiswa->nim }}</td>
                                        </tr>
                                        <tr>
                                            <th>Prodi</th>
                                            <td>:</td>
                                            <td>{{ $prodi->nama }}</td>
                                        </tr>
                                        <tr>
                                            <th>No Telp</th>
                                            <td>:</td>
                                            <td>{{ $mahasiswa->notelp }}</td>
                                        </tr>

                                    </table>
                                </div>
                                <div class="col-6">
                                    <table>
                                        <tr>
                                            <th>Alamat</th>
                                            <td>:</td>
                                            <td>{{ $mahasiswa->alamat }}</td>
                                        </tr>
                                        <tr>
                                            <th width="200">Semester</th>
                                            <td width="10">:</td>
                                            <td>{{ $bebaspustaka->semester }}</td>
                                        </tr>
                                        <tr>
                                            <th>Punya Kartu Perpustakaan</th>
                                            <td>:</td>
                                            <td>{{ $bebaspustaka->punyakartuperpus }}</td>
                                        </tr>
                                        <tr>
                                            <th>No Kartu</th>
                                            <td>:</td>
                                            <td>{{ $bebaspustaka->nokartu }}</td>
                                        </tr>

                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="invoice p-3 mb-3 xshadow">

                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home"
                                        role="tab" aria-controls="home" aria-selected="true">Kartu Anggota Pustaka
                                        FEBI</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                        aria-controls="profile" aria-selected="false">Skripsi Repository (Template UIN
                                        Jambi)</a>
                                </li>

                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <br>
                                <div class="tab-pane fade show active" id="home" role="tabpanel"
                                    aria-labelledby="home-tab">
                                    <img src="{{ url('storage/' . $bebaspustakafile->kartuanggota) }}" width="50%"
                                        height="300">
                                    <br>
                                    <a href="{{ $downloadkartuanggota }}" class="btn btn-success btn-xs mt-2"><i
                                            class="fa fa-download"></i> Download
                                        Kartu Anggota</a>
                                </div>
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                                    <iframe src="{{ url('storage/' . $bebaspustakafile->fileskripsi) }}" width="100%"
                                        height="550"></iframe>
                                </div>

                            </div>

                            <hr>

                            <div class="form-group">
                                <label>Aktifkan Tombol Cetak Bebas Pustaka</label>
                                {{ Form::select('cetaksurat', ['Non Aktif' => 'Non Aktif', 'Aktif' => 'Aktif'], $bebaspustaka->cetaksurat, ['class' => 'form-control', 'required']) }}
                            </div>
                            <div class="row">
                                <div class="col">
                                    <button type="submit" class="btn btn-primary">Proses Bebas Pustaka</button>
                                </div>
                                <div class="col text-right">
                                    <a
                                        href="{{ route('bebaspustaka.kembalikeperbaikan', ['iddata' => $bebaspustaka->id]) }}"><i
                                            class="fa fa-arrow-left"></i> Kembalikan ke Status Perbaikan</a>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
@endsection
