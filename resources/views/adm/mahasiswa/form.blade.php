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
                        {!! Form::model($data, [
                            'route' => [$route, $data->id],
                            'method' => $method,
                            'files' => true,
                            'autocomplete' => 'off',
                        ]) !!}
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-right">Nama :</label>
                            <div class="col-sm-10">
                                {{ Form::text('nama', $data->nama, ['class' => 'form-control ' . ($errors->has('nama') ? 'is-invalid' : ''), 'placeholder' => 'Nama', 'autofocus']) }}
                                @error('nama')
                                    <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-right">NIM :</label>
                            <div class="col-sm-10">
                                {{ Form::text('nim', $data->nim, ['class' => 'form-control ' . ($errors->has('nim') ? 'is-invalid' : ''), 'placeholder' => 'NIM', 'autofocus']) }}
                                @error('nim')
                                    <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-right">Prodi :</label>
                            <div class="col-sm-10">
                                {{ Form::select('prodi_id',$prodi, $data->prodi_id, ['class' => 'form-control ' . ($errors->has('prodi_id') ? 'is-invalid' : ''), 'placeholder' => 'Pilih...', 'autofocus']) }}
                                @error('prodi_id')
                                    <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-right">Alamat :</label>
                            <div class="col-sm-10">
                                {{ Form::text('alamat', $data->alamat, ['class' => 'form-control ' . ($errors->has('alamat') ? 'is-invalid' : ''), 'placeholder' => 'Alamat', 'autofocus']) }}
                                @error('alamat')
                                    <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-right">No. Telp :</label>
                            <div class="col-sm-10">
                                {{ Form::text('notelp', $data->notelp, ['class' => 'form-control ' . ($errors->has('notelp') ? 'is-invalid' : ''), 'placeholder' => 'No Telp', 'autofocus']) }}
                                @error('notelp')
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

                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
