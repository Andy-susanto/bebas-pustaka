<h4>LAPORAN DATA BEBAS PUSTAKA</h4>
<h5>TAHUN : {{ $tahun }}</h5>
<br>
<table>
    <thead>
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
