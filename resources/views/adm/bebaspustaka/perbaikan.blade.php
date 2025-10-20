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
                                <h3><i class="fa fa-edit"></i> {{ $title }}</h3>
                            </div>
                            <div class="col-md-6 text-right">
                               
                            </div>
                        </div>
                        <hr>
                        <table id="example1" class="table table-sm table-bordered table-striped" style="font-size:13px">
                            <thead class="table-primary">
                                <tr>
                                    <th width="50">No</th>
                                    <th>NIM</th>
                                    <th>Nama</th>
                                     <th>Prodi</th>
                                    <th>No Telp</th>
                                    <th>Alamat</th>
                                    <th width="150">Bebas Pustaka Perbaikan</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($tabel as $rs)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $rs->nim }}</td>
                                        <td>{{ $rs->nama }}</td>
                                        <td>{{ $rs->namaprodi }}</td>
                                        <td>{{ $rs->notelp }}</td>
                                        <td>{{ $rs->alamat }}</td>
                                        <td>
                                            <a href="{{ route('bebaspustaka.perbaikandetail',['iddata' => $rs->idbebaspustaka]) }}" class="btn btn-success btn-xs"><i class="fa fa-edit"></i> Bebas Pustaka Perbaikan</a>
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
@endsection
