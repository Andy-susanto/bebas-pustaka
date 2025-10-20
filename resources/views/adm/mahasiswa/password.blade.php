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
            <div class="row">
                <div class="col-12">

                    <div class="invoice p-3 mb-3 shadow">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>{{ $title }}</h4>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="{{ $link }}" class="btn btn-warning btn-sm pull-right"><i
                                        class="fa fa-arrow-left"></i> Kembali</a>
                            </div>
                        </div>
                        <hr>
                        <table>
                            <tr>
                                <th width="200">Nama</th>
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
                        <hr>
                        <form action="{{ route('mhs.passwordproses') }}" method="post">
                            @csrf
                            <input type="hidden" name="idmhs" value="{{ $mahasiswa->id }}">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Password Baru</label>
                                    <input type="password" class="form-control" name="password">
                                </div>
                                <button type="submit" class="btn btn-info">Ubah Password</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.row -->
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
