<?php

namespace App\Exports;

use App\Models\Bebaspustaka;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PertriwulanExport implements FromView
{
    protected $triwulan;
    protected $tahun;

    public function __construct($triwulan, $tahun)
    {
        $this->triwulan = $triwulan;
        $this->tahun = $tahun;
    }

    public function view(): View
    {
        $twdata  = explode('x', $this->triwulan);
        $tawal = $this->tahun . '-' . $twdata[0];
        $takhir = $this->tahun . '-' . $twdata[1];
        $teks = \Info::listtriwulan()[$this->triwulan] . ' - ' . $this->tahun;
        $data = Bebaspustaka::getditerimatriwulan($tawal, $takhir);

        return view('adm.laporan.pertriwulan.pertriwulanexcel', [
            'tabel' => $data,
            'triwulan' => $teks
        ]);
    }
}
