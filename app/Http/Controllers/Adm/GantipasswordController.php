<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class GantipasswordController extends Controller
{
    private $title = 'Ganti Password';
    private $folder = 'adm.gantipassword';


    public function formpassword()
    {
        $data = [
            'title' => $this->title,
        ];
        
        return view($this->folder.'.form',$data);
    }

    public function passwordproses(Request $request) {
        $idadmin = Auth::guard('admin')->user()->id;
        $plama = $request->plama;
        $pbaru = $request->pbaru;

        $admin = Admin::find($idadmin);
        $cek = Hash::check($plama,$admin->password);
        if($cek) {
            $admin->password = Hash::make($pbaru);
            $admin->save();
            return redirect()
                    ->route('ganti.password.form')
                    ->with('success',"Berhasil ganti password");
        } else {
            return redirect()
                    ->route('ganti.password.form')
                    ->with('danger',"Gagal ganti password, password lama anda salah");
        }
    }
}
