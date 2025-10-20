<?php

namespace App\Exports;

use App\Models\Bebaspustaka;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PerbulanExport implements FromView
{
    protected $bulan;
    protected $tahun;

    public function __construct($bulan, $tahun)
    {
        $this->bulan = $bulan;
        $this->tahun = $tahun;
    }

    public function view(): View
    {
        $data = Bebaspustaka::getditerimaperbulan($this->bulan, $this->tahun);
        $bulan = \Info::listbulan()[$this->bulan] . ' ' . $this->tahun;

        return view('adm.laporan.perbulan.perbulanexcel', [
            'tabel' => $data,
            'bulan' => $bulan
        ]);
    }
}
