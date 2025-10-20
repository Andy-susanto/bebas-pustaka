@extends('adm.layouts.admlte')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header grad">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h3>{{ $title }}</h3>
                    </div>
                    <div class="col-md-6 text-right">
                        @php
                            $user = Auth::guard('admin')->user();
                            $level = $user->level;
                            $iduser = $user->id;
                        @endphp

                        @if ($level == 'Pemilik')
                            <a href="{{ $linkform }}" class="btn btn-primary btn-sm">Tambah</a>
                        @endif
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            @include('adm.layouts.flash')

            <div class="row">
                <div class="col-12">
                    <div class="invoice p-3 shadow">

                        <table id="example" class="table table-sm table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th width="50">No</th>
                                    <th>Nama</th>
                                    <th>Username</th>
                                    {{-- <th>Level</th> --}}
                                    <th width="80">Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($tabel as $rs)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $rs->nama }}</td>
                                        <td>{{ $rs->username }}</td>
                                        {{-- <td>{{ $rs->level }}</td> --}}
                                        <td>
                                             <a href="{{ route($linkedit, $rs->id) }}"><i class="fa fa-edit"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>

    <script>
        $(document).ready(function() {
            $('#modalHapus').on('show.bs.modal', function(e) {
                var target = $(e.relatedTarget);
                var iddata = target.data('id');

                var url = '{{ route($linkdestroy, ':id') }}';
                url = url.replace(':id', iddata);
                $("#deleteForm").attr('action', url);
            })
        });

        function formSubmit() {
            $("#deleteForm").submit();
        }
    </script>
@endsection
