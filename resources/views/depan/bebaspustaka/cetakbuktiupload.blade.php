<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Bukti Upload : {{ $mahasiswa->nama }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    {{-- <link rel="stylesheet" href="{{ url('bslaporan/bootstrap.min.css') }}"> --}}

    <style>
        @import url('{{ public_path('bslaporan/bootstrap.min.css') }}');

        /* Additional embedded styles */
        body {
            padding-top: 50px;
        }

        .page-break {
            page-break-after: always;
        }
    </style>


</head>

<body>
    <div class="container">
        <div class="row">
            <table>
                <tr>
                    <td><img src="{{ public_path('logo/logouin.png') }}" width="120" height="120"></td>
                    <td width="30"></td>
                    <td class="text-center">
                        <span style="font-weight: bold;font-size:20px">KEMENTERIAN AGAMA REPUBLIK INDONESIA</span>
                        <br>
                        <span style="font-weight: bold;font-size:19px">UNIVERSITAS ISLAM NEGERI SULTHAN THAHA SAIFUDDIN
                            JAMBI</span>
                        <br>
                        <span style="font-weight: bold;font-size:19px">FAKULTAS EKONOMI DAN BISNIS ISLAM</span>
                        <br>
                        <span>Jl. Jambi-Muara Buliah KM 16, Simpang Sei Duren, Jambi Luar Kota, Muaro Jambi, Jambi
                            36362</span>
                        <br>
                        <span>Telp/Fax : (0741) 60731 website : febi.uinjambi.ac.id</span>
                    </td>
                </tr>
            </table>
        </div>
        <hr style="border: 1px solid black">
        <div class="row">
            <div class="col text-center">
                <h5>KETERANGAN BUKTI UPLOAD</h5>
            </div>
            <br>
        </div>
        <div class="row">
            <div class="col">
                <p>Nama berikut ini telah melakukan pengisian data bebas pustaka dan telah di validasi :</p>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col">
                <table>
                    <tr>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td>
                            <table>
                                <tr>
                                    <td width="170">Nama</td>
                                    <td width="10">:</td>
                                    <td>{{ $mahasiswa->nama }}</td>
                                </tr>
                                <tr>
                                    <td>Prodi</td>
                                    <td>:</td>
                                    <td>{{ $prodi->nama }}</td>
                                </tr>
                                <tr>
                                    <td>NIM</td>
                                    <td>:</td>
                                    <td>{{ $mahasiswa->nim }}</td>
                                </tr>
                                <tr>
                                    <td>Semester</td>
                                    <td>:</td>
                                    <td>{{ $bebaspustaka->semester }}</td>
                                </tr>
                                <tr>
                                    <td>No Kartu Anggota</td>
                                    <td>:</td>
                                    <td>{{ $bebaspustaka->nokartu }}</td>
                                </tr>
                                <tr>
                                    <td>Alamat Sekarang</td>
                                    <td>:</td>
                                    <td>{{ $mahasiswa->alamat }}</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>

            </div>
        </div>

        <br>
        <div class="row">
            <div class="col">
                <p>* Yang di bawak pada saat penyerahan : </p>
                <ul>
                    <li>Kartu Anggota </li>
                    <li>Buku yang akan di Hibahkan Ke Perpustakaan</li>
                    <li>Bukti upload ini (dicetak)</li>
                </ul>
            </div>
        </div>
    </div>
</body>

</html>
