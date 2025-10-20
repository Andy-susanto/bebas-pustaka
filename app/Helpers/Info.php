<?php

namespace App\Helpers;

use App\Models\Pengaturan;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class Info {

    static function getInfo($id) {
        $info = Pengaturan::find($id);
        return strip_tags($info->deskripsi);
    }

    static function tanggal() {
        return date('Y-m-d H:i:s');
    }

    static function nama() {
        return self::getInfo(1);
    }

    static function alamat() {
        return self::getInfo(2);
    }

    static function notelp() {
        return self::getInfo(3);
    }

    static function namakabag() {
        return self::getInfo(4);
    }

    static function nipkabag() {
        return self::getInfo(5);
    }

    static function petunjukpengisian() {
        $info = Pengaturan::find(6);
        return $info->deskripsi;
    }

    static function listbulan() {
        return [
            '1' => 'Januari',
            '2' => 'Februari',
            '3' => 'Maret',
            '4' => 'April',
            '5' => 'Mei',
            '6' => 'Juni',
            '7' => 'Juli',
            '8' => 'Agustus',
            '9' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember',
        ];
    }

    static function listtahun() {
        $thn = [];

        for($t = date('Y'); $t >= 2025; $t--) {
            $thn[$t] = $t;
        }

        return $thn;
    }

    static function listtriwulan() {
        return [
            '01-1x03-31' => 'Triwulan I',
            '04-1x06-30' => 'Triwulan II',
            '07-1x09-30' => 'Triwulan III',
            '10-1x12-31' => 'Triwulan IV',
        ];
    }

    static function listsemester() {
        return [
            'VII' => 'VII (Tujuh)',
            'VIII' => 'VIII (Delapan)',
            'IX' => 'IX (Sembilan)',
            'X' => 'X (Sepuluh)',
            'XI' => 'XI (Sebelas)',
            'XII' => 'XII (Dua Belas)',
            'XIII' => 'XIII (Tiga Belas)',
            'XIV' => 'XIV (Empat Belas)',
        ];
    }

    static function listpersetujuan() {
        return [
            'Diproses' => 'Diproses',
            'Perbaikan' => 'Perbaikan',
            'Diterima' => 'Diterima',
        ];
    }

    static function formattglindo($tanggal) {
        return Carbon::create($tanggal)->isoFormat('D MMMM Y');
    }
}