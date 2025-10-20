<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use App\Models\Bebaspustaka;
use App\Models\Bebaspustakafile;
use App\Models\Mahasiswa;
use App\Models\Pengaturan;
use App\Models\Prodi;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Storage;

class BebaspustakaController extends Controller
{
    private $folder = 'adm.bebaspustaka';

    public function diproses() {

        $data = [
            'title' => 'Diproses / Baru',
            'tabel' => Bebaspustaka::getdiproses()
        ];
        return view($this->folder.'.diproses',$data);
    }

    public function perbaikan() {

        $data = [
            'title' => 'Perbaikan',
            'tabel' => Bebaspustaka::getperbaikan()
        ];
        return view($this->folder.'.perbaikan',$data);
    }

    public function diterima() {

        $data = [
            'title' => 'Diterima',
            'tabelnonaktif' => Bebaspustaka::getditerima('Non Aktif'),
            'tabelaktif' => Bebaspustaka::getditerima('Aktif')
        ];
        return view($this->folder.'.diterima',$data);
    }

    // view detail dan form
   
    // #######diproses detail
    public function diprosesdetail(Request $request) 
    {
        $idbebaspustaka = $request->iddata;
        $bebaspustaka = Bebaspustaka::find($idbebaspustaka);
        $mahasiswa = Mahasiswa::find($bebaspustaka->mahasiswa_id);
        $prodi = Prodi::find($mahasiswa->prodi_id);
        $bebaspustakafile = Bebaspustakafile::where('bebaspustaka_id',$idbebaspustaka)->get()->first();
        
        $data = [
            'title' => 'Proses Bebas Pustaka ',
            'link' => route('bebaspustaka.diproses'),
            'mahasiswa' => $mahasiswa,
            'prodi' => $prodi,
            'bebaspustaka' => $bebaspustaka,
            'bebaspustakafile' => $bebaspustakafile,
            'downloadkartuanggota' => route('bebaspustaka.downloadkartuanggota',['iddata' => $bebaspustakafile->id])
        ];
        return view($this->folder.'.diprosesdetail',$data);
    }

    public function savediproses(Request $request) 
    {
        $idbebaspustaka = $request->idbebaspustaka;
        $bebaspustakafile = Bebaspustakafile::where('bebaspustaka_id',$idbebaspustaka)->get()->first();
        
        Bebaspustaka::find($idbebaspustaka)->update([
            'statuspengajuan' => $request->statuspengajuan
        ]);

        Bebaspustakafile::find($bebaspustakafile->id)->update([
            'ketkartuanggota' => $request->ketkartuanggota,
            'ketfileskripsi' => $request->ketfileskripsi
        ]);

        return redirect()->route('bebaspustaka.diproses')->with('success',"Berhasil proses bebas pustaka");
    }

    // ####### perbaikan detail
    public function perbaikandetail(Request $request) 
    {
        $idbebaspustaka = $request->iddata;
        $bebaspustaka = Bebaspustaka::find($idbebaspustaka);
        $mahasiswa = Mahasiswa::find($bebaspustaka->mahasiswa_id);
        $prodi = Prodi::find($mahasiswa->prodi_id);
        $bebaspustakafile = Bebaspustakafile::where('bebaspustaka_id',$idbebaspustaka)->get()->first();
        
        $data = [
            'title' => 'Perbaikan Bebas Pustaka ',
            'link' => route('bebaspustaka.perbaikan'),
            'mahasiswa' => $mahasiswa,
            'prodi' => $prodi,
            'bebaspustaka' => $bebaspustaka,
            'bebaspustakafile' => $bebaspustakafile,
            'downloadkartuanggota' => route('bebaspustaka.downloadkartuanggota',['iddata' => $bebaspustakafile->id])
        ];
        return view($this->folder.'.perbaikandetail',$data);
    }

    public function saveperbaikan(Request $request) 
    {
        $idbebaspustaka = $request->idbebaspustaka;
        $bebaspustakafile = Bebaspustakafile::where('bebaspustaka_id',$idbebaspustaka)->get()->first();
        
        Bebaspustaka::find($idbebaspustaka)->update([
            'statuspengajuan' => $request->statuspengajuan
        ]);

        Bebaspustakafile::find($bebaspustakafile->id)->update([
            'ketkartuanggota' => $request->ketkartuanggota,
            'ketfileskripsi' => $request->ketfileskripsi
        ]);

        return redirect()->route('bebaspustaka.perbaikan')->with('success',"Berhasil proses data perbaikain");
    }

    // diterima proses 
    public function diterimaproses(Request $request) 
    {

        $idbebaspustaka = $request->iddata;
        $bebaspustaka = Bebaspustaka::find($idbebaspustaka);
        $mahasiswa = Mahasiswa::find($bebaspustaka->mahasiswa_id);
        $prodi = Prodi::find($mahasiswa->prodi_id);
        $bebaspustakafile = Bebaspustakafile::where('bebaspustaka_id',$idbebaspustaka)->get()->first();
        
        $data = [
            'title' => 'Aktifkan Tombol Cetak Bebas Pustaka ',
            'link' => route('bebaspustaka.diterima'),
            'mahasiswa' => $mahasiswa,
            'prodi' => $prodi,
            'bebaspustaka' => $bebaspustaka,
            'bebaspustakafile' => $bebaspustakafile,
            'downloadkartuanggota' => route('bebaspustaka.downloadkartuanggota',['iddata' => $bebaspustakafile->id])
        ];
        return view($this->folder.'.diterimaproses',$data);
    }

     public function kembalikeperbaikan(Request $request) 
    {
        $idbebaspustaka = $request->iddata;
        $bebaspustaka = Bebaspustaka::find($idbebaspustaka);
        $bebaspustaka->statuspengajuan = "Perbaikan";
        $bebaspustaka->cetaksurat = "Non Aktif";
        $bebaspustaka->save();

        return redirect()->route('bebaspustaka.diterima')->with('success',"Berhasil mengembalikan data ke Perbaikan");
    }

    public function savediterima(Request $request) 
    {
        $idbebaspustaka = $request->idbebaspustaka;
        
        Bebaspustaka::find($idbebaspustaka)->update([
            'cetaksurat' => $request->cetaksurat,
            'namakabag' => Pengaturan::namakabag(),
            'nipkabag' => Pengaturan::nipkabag()
        ]);

        return redirect()->route('bebaspustaka.diterima')->with('success',"Berhasil simpan data");
    }

    // download kartu
    public function downloadkartuanggota(Request $request)
    {
        $iddata = $request->iddata;
        $model = Bebaspustakafile::find($iddata);
        $file = Storage::disk('public')->path($model->kartuanggota);
        return response()->download($file);
    }

    // cetak buktiupload
    public function cetakbuktiupload(Request $request) 
    {
        $idbebaspustaka = $request->iddata;
        $bebaspustaka = Bebaspustaka::find($idbebaspustaka);
        $mahasiswa = Mahasiswa::find($bebaspustaka->mahasiswa_id);
        $prodi = Prodi::find($mahasiswa->prodi_id);

        $data = [
            'title' => 'Cetak Bukti Upload',
            'mahasiswa' => $mahasiswa,
            'prodi' => $prodi,
            'bebaspustaka' => $bebaspustaka 
        ];

        $pdf = Pdf::loadView($this->folder.'.cetakbuktiupload', $data);
        $pdf->setPaper('A4', 'portrait');
        $namafile = $mahasiswa->nama.'_'.$mahasiswa->nim.'_buktiupload.pdf';
        return $pdf->download($namafile);
    }

    // cetak surat bebas pustaka
    public function cetaksuratbebaspustaka(Request $request) 
    {
        $idbebaspustaka = $request->iddata;
        $bebaspustaka = Bebaspustaka::find($idbebaspustaka);
        $mahasiswa = Mahasiswa::find($bebaspustaka->mahasiswa_id);
        $prodi = Prodi::find($mahasiswa->prodi_id);

        $data = [
            'title' => 'Cetak Bebas Pustaka ',
            'mahasiswa' => $mahasiswa,
            'prodi' => $prodi,
            'bebaspustaka' => $bebaspustaka 
        ];

        $pdf = Pdf::loadView($this->folder.'.cetaksuratbebaspustaka', $data);
        $pdf->setPaper('A4', 'portrait');
        $namafile = $mahasiswa->nama.'_'.$mahasiswa->nim.'_suratbebaspustaka.pdf';
        return $pdf->download($namafile);
    }
}
