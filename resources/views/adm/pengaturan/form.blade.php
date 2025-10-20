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
                        <div class="row mb-2">
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
                                {{ Form::text('nama', $data->nama, ['class' => 'form-control ', 'placeholder' => 'Nama', 'autofocus', 'required','readonly']) }}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-right">Deskripsi :</label>
                            <div class="col-sm-10">
                                {{ Form::textarea('deskripsi', $data->deskripsi, ['id' => 'deskripsi', 'class' => 'form-control', 'rows' => 3]) }}
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

    <script src="{{ url('tinymce/tinymce.min.js') }}"></script>

    <script type="text/javascript">
        $(function() {
            tinyMCE.init({
                selector: '#deskripsi',
                plugins: [
                    'advlist autolink lists link charmap print preview anchor',
                    'searchreplace visualblocks code fullscreen',
                    'insertdatetime media table contextmenu paste code'
                ],
                toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
            })
        });
    </script>
@endsection
