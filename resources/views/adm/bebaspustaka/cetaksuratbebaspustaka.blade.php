<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Surat Bebas Pustaka : {{ $mahasiswa->nama }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

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

<body onload="window.print()">
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
                <span style="font-weight: bold;font-size:19px">Surat Keterangan Bebas Pustaka</span>
                <br>
                <span>Nomor : B- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; /D.V.9/PP.00.9/{{ date('Y') }}</span>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col">
                <p>Kepala Bagian Tata Usaha Fakultas Ekonomi dan Bisnis Islam Universitas Islam Negeri Sulthan Thaha
                    Saifuddin Jambi dengan ini menerangkan bahwa :</p>
            </div>
        </div>
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
                <p>Terhitung sejak tanggal {{ \Info::formattglindo($bebaspustaka->tanggalsurat) }} sudah bebas dari
                    peminjaman buku pada
                    Perpustakaan Fakultas Ekonomi dan Bisnis Islam Universitas Sulthan Thaha Saifuddin Jambi</p>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <p>Demikianlah surat keterangan ini dibuat untuk dapat dipergunakan sebagaimana mestinya</p>
            </div>
        </div>
        <br><br>
        <div class="row">
            <div class="col">
                <table width="100%">
                    <tr>
                        <td width="70%"></td>
                        <td width="30%">
                            <p>Jambi, {{ \Info::formattglindo($bebaspustaka->tanggalsurat) }} <br>Kepala Bagian Tata Usaha</p>

                            <br>
                            <br>
                            <br>
                            <p>{{ \Info::namakabag() }} <br>NIP. {{ \Info::namakabag() }}</p>
                        </td>
                    </tr>
                </table>
            </div>

        </div>
    </div>
</body>

</html>
