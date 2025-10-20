<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ \Info::nama() }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ url('bslaporan/bootstrap.min.css') }}">
    <style>
        body {
            padding-top: 50px;
        }
    </style>
</head>

<body onload="window.print()">
    <div class="container">
        <div class="row">
            <div class="col-sm-1">
                <img src="{{ url('logo/logouin.png') }}" width="120" height="120">
            </div>
            <div class="col-sm-11 text-center">
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
            </div>
        </div>

        <hr>

        @yield('content')

        <div class="row">
            <div class="col-sm-8"></div>
            <div class="col-sm-4">
                <p></p>

                <br>
                <br>
                <p></p>
            </div>
        </div>
    </div>
</body>

</html>
