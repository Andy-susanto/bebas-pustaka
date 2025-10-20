@extends('adm.layouts.admlte')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header grad">
            <div class="container-fluidx">
                <div class="row">
                    <div class="col-sm-6">
                        <h3>{{ $title }}</h3>
                    </div>

                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            @include('adm.layouts.flash')

            <div class="row">
                <div class="col-12">
                    <div class="invoice p-3 mb-3">
                        <label>Pertriwulan (Triwulan / Tahun)</label>
                        <div class="row">
                            <div class="col-md-4">
                                {{ Form::select('triwulan', \Info::listtriwulan(), '', ['id' => 'triwulan','placeholder' => 'Pilih...', 'class' => 'form-control form-control-sm']) }}
                            </div>
                            <div class="col-md-4">
                                {{ Form::select('tahun', \Info::listtahun(), date('Y'), ['id' => 'tahun', 'class' => 'form-control form-control-sm']) }}
                            </div>
                            <div class="col-4">
                                <button type="button" id="caripertriwulan" class="btn btn-sm btn-success btn-block"><i
                                        class="fa fa-search"></i> Cari Pertriwulan</button>
                            </div>
                        </div>
                        <!-- /.card-header -->
						<hr>
                        <div id="loadData">

                        </div>
                        <!-- /.card-body -->
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

            $(function() {
                // showDataBulan()
            });



            $('#caripertriwulan').on('click', function() {
                showDataTriwulan();
            })

            function showDataTriwulan() {
                var vtriwulan = $('#triwulan').val();
                var vtahun = $('#tahun').val();
                var url = '{{ $linkcaritriwulan }}';
                $.get(url, {
                    triwulan: vtriwulan,
                    tahun: vtahun,
                    view: 'show'
                }, function(data) {
                    $('#loadData').html(data);
                }, 'html');

            }
        })
    </script>
@endsection
