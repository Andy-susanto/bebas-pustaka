<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Mahasiswa;
use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MhsGantipasswordController extends Controller
{
    private $title = 'Ganti Password Mahasiswa';
    private $folder = 'adm.mahasiswa';


    public function formpassword(Request $request)
    {
        $idmhs = $request->idmhs;
        $mahasiswa = Mahasiswa::find($idmhs);
        $prodi = Prodi::find($mahasiswa->prodi_id);
        $data = [
            'title' => $this->title,
            'link' => route('mahasiswa.index'),
            'mahasiswa' => $mahasiswa,
            'prodi' => $prodi
        ];
        
        return view($this->folder.'.password',$data);
    }

    public function passwordproses(Request $request) {
        $idmhs = $request->idmhs;
        Mahasiswa::find($idmhs)->update([
            'password' => Hash::make($request->password)
        ]);

        return redirect()
                    ->route('mahasiswa.index')
                    ->with('success',"Berhasil ganti password");
    }
}
