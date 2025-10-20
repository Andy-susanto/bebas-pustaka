<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Bebaspustaka extends Model
{
    use HasFactory;

    protected $table = 'bebaspustaka';
    protected $guarded = [];


    static function getdiproses() {
        $q = "SELECT
                bebaspustaka.id AS idbebaspustaka,
                bebaspustaka.statuspengajuan,
                mahasiswa.id AS idmahasiswa,
                mahasiswa.nama,
                mahasiswa.nim,
                mahasiswa.notelp,
                mahasiswa.alamat,
                prodi.nama AS namaprodi
            FROM bebaspustaka
            INNER JOIN mahasiswa ON bebaspustaka.mahasiswa_id = mahasiswa.id
            INNER JOIN prodi ON mahasiswa.prodi_id = prodi.id
            WHERE bebaspustaka.statuspengajuan = 'Diproses' AND bebaspustaka.cetaksurat = 'Non Aktif'
            ORDER BY bebaspustaka.created_at DESC";
        return collect(DB::select(DB::raw($q)));
    }

    static function getperbaikan() {
        $q = "SELECT
                bebaspustaka.id AS idbebaspustaka,
                bebaspustaka.statuspengajuan,
                mahasiswa.id AS idmahasiswa,
                mahasiswa.nama,
                mahasiswa.nim,
                mahasiswa.notelp,
                mahasiswa.alamat,
                prodi.nama AS namaprodi
            FROM bebaspustaka
            INNER JOIN mahasiswa ON bebaspustaka.mahasiswa_id = mahasiswa.id
            INNER JOIN prodi ON mahasiswa.prodi_id = prodi.id
            WHERE bebaspustaka.statuspengajuan = 'Perbaikan' AND bebaspustaka.cetaksurat = 'Non Aktif'
            ORDER BY bebaspustaka.created_at DESC";
        return collect(DB::select(DB::raw($q)));
    }

    static function getditerima($cetak) {
        $q = "SELECT
                bebaspustaka.id AS idbebaspustaka,
                bebaspustaka.statuspengajuan,
                mahasiswa.id AS idmahasiswa,
                mahasiswa.nama,
                mahasiswa.nim,
                mahasiswa.notelp,
                mahasiswa.alamat,
                prodi.nama AS namaprodi
            FROM bebaspustaka
            INNER JOIN mahasiswa ON bebaspustaka.mahasiswa_id = mahasiswa.id
            INNER JOIN prodi ON mahasiswa.prodi_id = prodi.id
            WHERE bebaspustaka.statuspengajuan = 'Diterima' AND bebaspustaka.cetaksurat = '$cetak'
            ORDER BY bebaspustaka.created_at DESC";
        return collect(DB::select(DB::raw($q)));
    }

    // perbulan
    static function getditerimaperbulan($bulan,$tahun) {
        $q = "SELECT
                bebaspustaka.statuspengajuan,
                bebaspustaka.tanggalsurat,
                mahasiswa.nama,
                mahasiswa.nim,
                mahasiswa.notelp,
                mahasiswa.alamat,
                prodi.nama AS namaprodi
            FROM bebaspustaka
            INNER JOIN mahasiswa ON bebaspustaka.mahasiswa_id = mahasiswa.id
            INNER JOIN prodi ON mahasiswa.prodi_id = prodi.id
            WHERE bebaspustaka.statuspengajuan = 'Diterima' 
            AND bebaspustaka.cetaksurat = 'Aktif'
            AND MONTH(tanggalsurat) = '$bulan' AND YEAR(tanggalsurat) = '$tahun'
            ORDER BY bebaspustaka.created_at ASC";
        return collect(DB::select(DB::raw($q)));
    }

    // perbulan
    static function getditerimatriwulan($tawal,$takhir) {
        $q = "SELECT
                bebaspustaka.statuspengajuan,
                bebaspustaka.tanggalsurat,
                mahasiswa.nama,
                mahasiswa.nim,
                mahasiswa.notelp,
                mahasiswa.alamat,
                prodi.nama AS namaprodi
            FROM bebaspustaka
            INNER JOIN mahasiswa ON bebaspustaka.mahasiswa_id = mahasiswa.id
            INNER JOIN prodi ON mahasiswa.prodi_id = prodi.id
            WHERE bebaspustaka.statuspengajuan = 'Diterima' 
            AND bebaspustaka.cetaksurat = 'Aktif'
            AND DATE(tanggalsurat) >= '$tawal' AND DATE(tanggalsurat) <= '$takhir'
            ORDER BY bebaspustaka.created_at ASC";
            
        return collect(DB::select(DB::raw($q)));
    }

    // perbulan
    static function getditerimapertahun($tahun) {
        $q = "SELECT
                bebaspustaka.statuspengajuan,
                bebaspustaka.tanggalsurat,
                mahasiswa.nama,
                mahasiswa.nim,
                mahasiswa.notelp,
                mahasiswa.alamat,
                prodi.nama AS namaprodi
            FROM bebaspustaka
            INNER JOIN mahasiswa ON bebaspustaka.mahasiswa_id = mahasiswa.id
            INNER JOIN prodi ON mahasiswa.prodi_id = prodi.id
            WHERE bebaspustaka.statuspengajuan = 'Diterima' 
            AND bebaspustaka.cetaksurat = 'Aktif'
            AND YEAR(tanggalsurat) = '$tahun'
            ORDER BY bebaspustaka.created_at ASC";
        return collect(DB::select(DB::raw($q)));
    }
}
