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
                                <h3>{{ $title }}</h3>
                            </div>
                            <div class="col-md-6 text-right">
                                {{-- <a href="{{ $linkform }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>
                                    Tambah</a> --}}
                                {{-- <a href="{{ route('pengaturanlain.edit', 7) }}" class="btn btn-success btn-sm"><i
                                        class="fa fa-edit"></i> Alur Bebas Pustaka</a> --}}
                                <a href="{{ route('pengaturanlain.edit', 6) }}" class="btn btn-success btn-sm"><i
                                        class="fa fa-edit"></i> Petunjuk Pengisian</a>

                            </div>
                        </div>
                        <table id="example12" class="table table-sm xtable-bordered table-striped">
                            <thead>
                                <tr>
                                    <th width="50">No</th>
                                    <th width="150">Nama</th>
                                    <th>Deskripsi</th>
                                    <th width="50">Edit</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($tabel as $rs)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $rs->nama }}</td>
                                        <td>{!! strip_tags($rs->deskripsi) !!}</td>
                                        <td>
                                            <a href="{{ route($linkedit, $rs->id) }}" title="Ubah"><i
                                                    class="fa fa-edit"></i></a>
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
