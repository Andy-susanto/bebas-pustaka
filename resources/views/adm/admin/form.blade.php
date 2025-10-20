@extends('adm.layouts.admlte')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header grad">
            <div class="container-fluidx">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ $title }}</h1>
                    </div>
                    <div class="col-md-6 text-right">
                        <a href="{{ $link }}" class="btn btn-warning btn-sm pull-right">Kembali</a>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">

                    <div class="invoice p-3">
                        {!! Form::model($data, [
                            'route' => [$route, $data->id],
                            'method' => $method,
                            'files' => true,
                            'autocomplete' => 'off',
                        ]) !!}


                        <div class="form-group">
                            <label for="">Nama :</label>
                            {{ Form::text('nama', $data->nama, ['class' => 'form-control ' . ($errors->has('nama') ? 'is-invalid' : ''), 'placeholder' => 'Nama', 'autofocus']) }}
                            @error('nama')
                                <div class="text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Username :</label>
                            {{ Form::text('username', $data->username, ['class' => 'form-control ' . ($errors->has('username') ? 'is-invalid' : ''), 'placeholder' => 'Username', 'autofocus']) }}
                            @error('username')
                                <div class="text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Password :</label>
                            {{ Form::password('password', ['class' => 'form-control ' . ($errors->has('password') ? 'is-invalid' : ''), 'placeholder' => 'Password', 'autofocus']) }}
                            @error('password')
                                <div class="text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group" style="display:none">
                            <label for="">Level :</label>
                            {{ Form::select('level', ['Admin' => 'Admin'], $data->level, ['class' => 'form-control ' . ($errors->has('level') ? 'is-invalid' : ''), 'placeholder' => 'Pilih...', 'autofocus']) }}
                            @error('level')
                                <div class="text text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>

                        {!! Form::close() !!}

                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
@endsection
