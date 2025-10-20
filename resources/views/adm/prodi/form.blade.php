@extends('adm.layouts.admlte')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header grad">
            <div class="container-fluidx">

            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="invoice p-3 mb-3 shadow">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h4>{{ $title }}</h4>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="{{ $link }}" class="btn btn-warning btn-sm pull-right"><i
                                        class="fa fa-arrow-left"></i> Kembali</a>
                            </div>
                        </div>
                        <hr>
                        {!! Form::model($data, [
                            'route' => [$route, $data->id],
                            'method' => $method,
                            'files' => true,
                            'autocomplete' => 'off',
                        ]) !!}

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-right">Nama Prodi :</label>
                            <div class="col-sm-10">
                                {{ Form::text('nama', $data->nama, ['class' => 'form-control ', 'placeholder' => 'Nama Prodi', 'autofocus']) }}
                                @error('nama')
                                    <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-6">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>

                        {!! Form::close() !!}
                    </div>

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
@endsection
