<script src="{{ url('highchart') }}/highcharts.js"></script>
<script src="{{ url('highchart') }}/modules/exporting.js"></script>

<div class="row">
    <div class="col">
        <div class="card shadow">
            <div class="card-body">
                <div id="grafikpenjualanbulanan" style="min-width: 100%; height:auto;"></div>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="card mt-2 shadow">
            <div class="card-body">
                <div id="grafikkategori" style="min-width: 100%; height:auto;"></div>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {

        Highcharts.setOptions({
            lang: {
                decimalPoint: '.',
                thousandsSep: ','
            }
        });

        Highcharts.chart('grafikpenjualanbulanan', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Grafik transaksi penjualan perbulan {{ $tahun }}',
            },
            accessibility: {
                announceNewData: {
                    enabled: true
                }
            },
            xAxis: {
                type: 'category'
            },
            yAxis: {
                title: {
                    text: 'Jumlah'
                },

                // stackLabels: {
                //     enabled: true,
                //     format: '{total:,.2f} $usc'
                // },
                // labels: {
                //     format: "{value:,.2f} $us",
                // }

                // labels: {
                //     format: '{value:,.0f} Rp'
                // }

            },
            legend: {
                enabled: false
            },
            plotOptions: {
                series: {
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true,
                        // format: '{point.y}'
                        format: 'Rp. {point.y:,.0f}'
                    }
                }
            },

            // plotOptions: {
            //     column: {
            //         stacking: 'normal',
            //         dataLabels: {
            //             format: 'Rp. {point.y:,.0f}',
            //             enabled: true,
            //             color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white',
            //         }
            //     }
            // },

            tooltip: {
                headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b> of total<br/>'
            },

            series: [{
                name: "Jumlah",
                colorByPoint: true,
                data: [{!! $grafikpenjualanbulanan !!}]
            }]
        });

        Highcharts.chart('grafikkategori', {
            chart: {
                type: 'bar'
            },
            title: {
                text: 'Grafik Penjualan Perkategori Tahun {{ $tahun }}'
            },
            accessibility: {
                announceNewData: {
                    enabled: true
                }
            },
            xAxis: {
                type: 'category'
            },
            yAxis: {
                title: {
                    text: 'Jumlah'
                }

            },
            legend: {
                enabled: false
            },
            plotOptions: {
                series: {
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true,
                        format: 'Rp. {point.y:,.0f}'
                    }
                }
            },

            tooltip: {
                headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b> of total<br/>'
            },

            series: [{
                name: "Tahun",
                colorByPoint: true,
                data: [{!! $grafikkategori !!}]
            }]
        });



    });
</script>
