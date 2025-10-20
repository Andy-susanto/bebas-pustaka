<?php

namespace App\Exports;

use App\Models\Bebaspustaka;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PertahunExport implements FromView
{

    protected $tahun;

    public function __construct($tahun)
    {
        $this->tahun = $tahun;
    }

    public function view(): View
    {
        $data = Bebaspustaka::getditerimapertahun($this->tahun);
        $tahun = $this->tahun;

        return view('adm.laporan.pertahun.pertahunexcel', [
            'tabel' => $data,
            'tahun' => $tahun
        ]);
    }
}
