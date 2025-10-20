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
                    <div class="invoice p-3 mb-3 shadow">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h3><i class="fa fa-check"></i> {{ $title }}</h3>
                            </div>
                            <div class="col-md-6 text-right">

                            </div>
                        </div>

                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                    aria-controls="home" aria-selected="true">Daftar Mahasiswa Belum Melakukan Penyerahan
                                    Buku</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                    aria-controls="profile" aria-selected="false">Daftar Mahasiswa Sudah Melakukan
                                    Penyerahan Buku</a>
                            </li>

                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <br>
                            <div class="tab-pane fade show active" id="home" role="tabpanel"
                                aria-labelledby="home-tab">
                                <table class="table table-sm table-bordered table-striped tabledata" style="font-size:13px">
                                    <thead class="table-primary">
                                        <tr>
                                            <th width="50">No</th>
                                            <th>NIM</th>
                                            <th>Nama</th>
                                            <th>Prodi</th>
                                            <th>No Telp</th>
                                            <th>Alamat</th>
                                            <th width="170">Proses</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($tabelnonaktif as $rs)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $rs->nim }}</td>
                                                <td>{{ $rs->nama }}</td>
                                                <td>{{ $rs->namaprodi }}</td>
                                                <td>{{ $rs->notelp }}</td>
                                                <td>{{ $rs->alamat }}</td>
                                                <td>
                                                    <a href="{{ route('bebaspustaka.diterimaproses', ['iddata' => $rs->idbebaspustaka]) }}"
                                                        class="btn btn-success btn-xs"><i class="fa fa-edit"></i>Proses</a>
                                                    <a href="{{ route('bebaspustaka.cetakbuktiupload',['iddata' => $rs->idbebaspustaka]) }}" class="btn btn-info btn-xs" target="_blank"><i class="fa fa-print"></i> Cetak Bukti Upload</a>
                                                    </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <table class="table table-sm table-bordered table-striped tabledata" style="font-size:13px">
                                    <thead class="table-primary">
                                        <tr>
                                            <th width="50">No</th>
                                            <th>NIM</th>
                                            <th>Nama</th>
                                            <th>Prodi</th>
                                            <th>No Telp</th>
                                            <th>Alamat</th>
                                            <th width="120">Proses</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($tabelaktif as $rs)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $rs->nim }}</td>
                                                <td>{{ $rs->nama }}</td>
                                                <td>{{ $rs->namaprodi }}</td>
                                                <td>{{ $rs->notelp }}</td>
                                                <td>{{ $rs->alamat }}</td>
                                                <td>
                                                    <a href="{{ route('bebaspustaka.diterimaproses', ['iddata' => $rs->idbebaspustaka]) }}"
                                                        class="btn btn-success btn-xs"><i class="fa fa-edit"></i>Proses</a>
                                                        <a href="{{ route('bebaspustaka.cetaksuratbebaspustaka',['iddata' => $rs->idbebaspustaka]) }}" target="_blank" class="btn btn-info btn-xs"><i class="fa fa-print"></i> Cetak Surat Bebas Pustaka</a>
                                                    </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
@endsection
