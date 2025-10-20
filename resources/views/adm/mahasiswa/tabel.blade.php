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
                                <h3><i class="fa fa-users"></i> {{ $title }}</h3>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="{{ $linkform }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>
                                    Tambah</a>
                            </div>
                        </div>
                        <hr>
                        <table id="example1" class="table table-sm xtable-bordered table-striped">
                            <thead>
                                <tr>
                                    <th width="50">No</th>
                                    <th>Prodi</th>
                                    <th>NIM</th>
                                    <th>Nama</th>
                                    <th>No Telp</th>
                                    <th>Alamat</th>
                                    <th>Ganti Password</th>
                                    <th width="80">Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($tabel as $rs)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $rs->namaprodi }}</td>
                                        <td>{{ $rs->nim }}</td>
                                        <td>{{ $rs->nama }}</td>
                                        <td>{{ $rs->notelp }}</td>
                                        <td>{{ $rs->alamat }}</td>
                                        <td>
                                            <a href="{{ route('mhs.formpassword',['idmhs' => $rs->id]) }}" class="btn btn-xs btn-warning"><i class="fa fa-key"></i> Ganti Password</a>
                                        </td>
                                        <td>
                                            <a href="{{ route($linkedit, $rs->id) }}"><i class="fa fa-edit"></i></a> |
                                            <a data-toggle="modal" data-target="#modalHapus" data-id="{{ $rs->id }}"
                                                href="#"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>

    @include('adm.layouts.modalhapus')
@endsection
