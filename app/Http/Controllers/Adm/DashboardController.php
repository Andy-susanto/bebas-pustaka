<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use App\Models\Bebaspustaka;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    private $title = 'Dashboard';

    public function index()
    {
        $data = [
            'aks' => $this->jumlahbebaspustaka('Akuntansi Syariah'),
            'pbs' => $this->jumlahbebaspustaka('Perbankan Syariah'),
            'esy' => $this->jumlahbebaspustaka('Ekonomi Syariah'),
            'mks' => $this->jumlahbebaspustaka('Manajemen Keuangan Syariah'),
            'tabeldiproses' => Bebaspustaka::getdiproses(),
            'tabelperbaikan' => Bebaspustaka::getperbaikan()
        ];

        return view('adm.dashboard.dashboard',$data);
    }

    function jumlahbebaspustaka($prodi) {
        $q = "SELECT 
                COUNT(*) AS jumlah 
                FROM bebaspustaka
                INNER JOIN mahasiswa ON bebaspustaka.mahasiswa_id = mahasiswa.id
                INNER JOIN prodi ON mahasiswa.prodi_id = prodi.id
                WHERE prodi.nama = '$prodi' AND bebaspustaka.statuspengajuan = 'Diterima'";

        $r = collect(DB::select(DB::raw($q)));
        $jumlah = 0;
        if($r->count()) {
            $jumlah = $r->first()->jumlah;
        }

        return $jumlah;
    }

    public function grafikpenjualanbulanan()
    {
        $q = "SELECT
                MONTH(tgltransaksi) AS bulan,
                SUM(total) AS total
            FROM keluar
            WHERE YEAR(tgltransaksi) = YEAR(CURDATE())
            GROUP BY MONTH(tgltransaksi)";


        $rs = collect(DB::select(DB::raw($q)));
        $datanya = '';

        foreach ($rs as $dt) {
            $total = $dt->total == null ? 0 : $dt->total;
            $datanya .= '{name: "' . \Info::listbulan()[$dt->bulan]. '",y: ' .$total. '},';
        }

        return $datanya;
    }

    public function grafikkategori()
    {
        $q = "SELECT
                nama,
                (
                SELECT SUM(detailkeluar.harga) FROM detailkeluar
                INNER JOIN barang ON detailkeluar.barang_id = barang.id
                INNER JOIN keluar ON detailkeluar.keluar_id = keluar.id
                WHERE YEAR(keluar.tgltransaksi) = YEAR(CURDATE())
                AND barang.kategori_id = kategori.id
                ) AS total
            FROM kategori";


        $rs = collect(DB::select(DB::raw($q)));
        $datanya = '';

        foreach ($rs as $dt) {
            $total = $dt->total == null ? 0 : $dt->total;
            $datanya .= '{name: "' . $dt->nama. '",y: ' .$total. '},';
        }

        return $datanya;
    }
}
