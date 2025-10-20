<a href="{{ $linkcetak }}" class="btn btn-info btn-sm" target="_blank"><i class="fa fa-print"></i> Cetak Laporan :
    {{ $triwulan }}</a>
<a href="{{ $linkexcel }}" class="btn btn-success btn-sm" target="_blank"><i class="fa fa-file-excel"></i> Ekspor Excel :
    {{ $triwulan }}</a>
<hr>

<div class="row">
    <div class="col-md-12">
        <table class="table table-sm table-bordered table-striped tabledata" style="font-size:13px">
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
