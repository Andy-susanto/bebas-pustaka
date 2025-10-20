<?php

namespace App\Http\Controllers\Adm;

use App\Exports\PerbulanExport;
use App\Exports\PertahunExport;
use App\Exports\PertriwulanExport;
use App\Http\Controllers\Controller;
use App\Models\Bebaspustaka;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class LaporanController extends Controller
{
    private $folder = 'adm.laporan';

    public function perbulan(Request $request)
    {
        $data['title'] = 'Laporan Perbulan';
        $data['linkcaribulan'] = route('laporan.perbulandata');
        return view($this->folder . '.perbulan.perbulan', $data);
    }

    public function perbulandata(Request $request)
    {
        $view = $request->view;
        $bulan = $request->bulan;
        $tahun = $request->tahun;

        $data['title'] = 'data';
        if ($view == 'show') {
            $data['tabel'] = Bebaspustaka::getditerimaperbulan($bulan, $tahun);
            $data['bulan'] = \Info::listbulan()[$bulan] . ' ' . $tahun;
            $data['linkcetak'] = route('laporan.perbulandata', ['bulan' => $bulan, 'tahun' => $tahun, 'view' => 'cetak']);
            $data['linkexcel'] = route('laporan.perbulandata', ['bulan' => $bulan, 'tahun' => $tahun, 'view' => 'excel']);
            return view($this->folder . '.perbulan.perbulanview', $data);
        } else if ($view == 'cetak') {
            $data['tabel'] = Bebaspustaka::getditerimaperbulan($bulan, $tahun);
            $data['bulan'] = \Info::listbulan()[$bulan] . ' ' . $tahun;
            return view($this->folder . '.perbulan.perbulancetak', $data);
        } else if ($view == 'excel') {
           return Excel::download(new PerbulanExport($bulan, $tahun), 'laporan-perbulan-excel.xlsx');
        }
    }

    public function pertriwulan(Request $request)
    {
        $data['title'] = 'Laporan Pertriwulan';
        $data['linkcaritriwulan'] = route('laporan.pertriwulandata');
        return view($this->folder . '.pertriwulan.pertriwulan', $data);
    }

    public function pertriwulandata(Request $request)
    {
        $view = $request->view;
        $triwulan = $request->triwulan;
        $tahun = $request->tahun;

        $twdata  = explode('x',$triwulan);
        $tawal = $tahun.'-'.$twdata[0];
        $takhir = $tahun.'-'.$twdata[1];
        $teks = \Info::listtriwulan()[$triwulan].' - '.$tahun;

        $data['title'] = 'data';

        if ($view == 'show') {
            $data['tabel'] = Bebaspustaka::getditerimatriwulan($tawal,$takhir);
            $data['triwulan'] = $teks;
            $data['linkcetak'] = route('laporan.pertriwulandata', ['triwulan' => $triwulan, 'tahun' => $tahun, 'view' => 'cetak']);
             $data['linkexcel'] = route('laporan.pertriwulandata', ['triwulan' => $triwulan, 'tahun' => $tahun, 'view' => 'excel']);
            return view($this->folder . '.pertriwulan.pertriwulanview', $data);
        } else if ($view == 'cetak') {
            $data['tabel'] = Bebaspustaka::getditerimatriwulan($tawal,$takhir);
            $data['triwulan'] = $teks;
            return view($this->folder . '.pertriwulan.pertriwulancetak', $data);
        } else if ($view == 'excel') {
           return Excel::download(new PertriwulanExport($triwulan,$tahun), 'laporan-pertriwulan-excel.xlsx');
        }
    }

    public function pertahun(Request $request)
    {
        $data['title'] = 'Laporan Pertahun';
        $data['linkcaritahun'] = route('laporan.pertahundata');
        return view($this->folder . '.pertahun.pertahun', $data);
    }

    public function pertahundata(Request $request)
    {
        $view = $request->view;
        $tahun = $request->tahun;

        $data['title'] = 'data';
        if ($view == 'show') {
            $data['tabel'] = Bebaspustaka::getditerimapertahun($tahun);
            $data['tahun'] = $tahun;
            $data['linkcetak'] = route('laporan.pertahundata', ['tahun' => $tahun, 'view' => 'cetak']);
            $data['linkexcel'] = route('laporan.pertahundata', ['tahun' => $tahun, 'view' => 'excel']);
            return view($this->folder . '.pertahun.pertahunview', $data);
        } else if ($view == 'cetak') {
            $data['tabel'] = Bebaspustaka::getditerimapertahun($tahun);
            $data['tahun'] = $tahun;
            return view($this->folder . '.pertahun.pertahuncetak', $data);
        } else if ($view == 'excel') {
           return Excel::download(new PertahunExport($tahun), 'laporan-pertahun-excel.xlsx');
        }
    }
}
