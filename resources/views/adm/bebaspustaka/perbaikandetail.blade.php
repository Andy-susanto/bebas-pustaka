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
                    <form action="{{ route('bebaspustaka.saveperbaikan') }}" method="post">
                        @csrf
                        <input type="hidden" name="idbebaspustaka" value="{{ $bebaspustaka->id }}">
                        <div class="invoice p-3 mb-3 shadow">
                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <h5><i class="fa fa-edit"></i> {{ $title }}</h5>
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

                            <p class="lead">Kartu Anggota Pustaka FEBI</p>

                            <div class="row">
                                <div class="col-6">
                                    <img src="{{ url('storage/' . $bebaspustakafile->kartuanggota) }}" width="100%"
                                        height="300">
                                    <br>
                                    <a href="{{ $downloadkartuanggota }}" class="btn btn-success btn-xs mt-2"><i
                                            class="fa fa-download"></i> Download
                                        Kartu Anggota</a>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Keterangan Kartu Anggota</label>
                                        {{ Form::textarea('ketkartuanggota', $bebaspustakafile->ketkartuanggota, ['class' => 'form-control', 'rows' => 2]) }}
                                        <span class="text-info"><i>Kosongkan inputan ini apabila tidak ada
                                                catatan</i></span>
                                    </div>
                                </div>

                            </div>
                            <hr>
                            <p class="lead">Skripsi Repository (Template UIN Jambi)</p>
                            <iframe src="{{ url('storage/' . $bebaspustakafile->fileskripsi) }}" width="100%"
                                height="550"></iframe>

                            <div class="form-group">
                                <label>Keterangan Laporan Skripsi</label>
                                {{ Form::textarea('ketfileskripsi', $bebaspustakafile->ketfileskripsi, ['class' => 'form-control', 'rows' => 2]) }}
                                <span class="text-info"><i>Kosongkan inputan ini apabila tidak ada catatan</i></span>
                            </div>

                            <div class="form-group">
                                <label>Status Persetujuan Bebas Pustaka</label>
                                {{ Form::select('statuspengajuan', \Info::listpersetujuan(), $bebaspustaka->statuspengajuan, ['class' => 'form-control', 'required']) }}
                            </div>
                            <button type="submit" class="btn btn-primary">Proses Bebas Pustaka</button>
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
