<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }
    th, td {
        border: 1px solid #000000; /* garis hitam */
        padding: 5px;
        text-align: left;
    }
    th {
        background-color: #f2f2f2;
        font-weight: bold;
    }
</style>

<h4>LAPORAN DATA BEBAS PUSTAKA</h4>
<h5>BULAN : {{ $bulan }}</h5>
<br>

<table style="font-size:12px" border="1">
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
