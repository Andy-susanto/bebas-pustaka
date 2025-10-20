@extends('adm.laporan.lapformat')

@section('content')

<div class="row">
    <div class="col-md-12 text-center">
        <h4>LAPORAN DATA BEBAS PUSTAKA</h4>
        <h5>BULAN : {{ $bulan }}</h5>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <table class="table table-striped table-sm table-bordered" style="font-size:12px">
            <thead class="table-dark">
                <tr>
                    <th width="50">No</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Prodi</th>
                    <th>No Telp</th>
                    <th>Alamat</th>
                    <th>Tanggal Surat</th>
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
                        <td>@tanggal($rs->tanggalsurat)</td>
                        
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</div>

@endsection