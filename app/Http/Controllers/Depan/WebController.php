<?php

namespace App\Http\Controllers\Depan;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class WebController extends Controller
{
    public function index()
    {
        $data = [];
        return view('depan.home.home',$data);
    }

    public function daftar() 
    {
        $data = [
            'prodi' => Prodi::pluck('nama','id')
        ];

        return view('depan.daftar.daftar',$data);
    }

    public function savedaftar(Request $request) {

        $request->validate(
            [
                'nama' => 'required',
                'nim' => 'required|unique:mahasiswa',
                'prodi_id' => 'required',
                'password' => 'required',
            ],
            [
                'nama.required' => 'Nama harus diisi',
                'nama.unique' => 'Nama sudah digunakan',
                'nim.required' => 'NIM harus diisi',
                'nim.unique' => 'NIM sudah digunakan',
                'prodi_id.required' => 'Prodi harus diisi',
                'password.required' => 'Kata Sandi / Password harus diisi',
            ]
        );

        $password = Hash::make($request->password);
        
        Mahasiswa::create([
            'nama' => $request->nama,
            'nim' => $request->nim,
            'password' => $password,
            'prodi_id' => $request->prodi_id
        ]);

        return redirect()->route('daftar.form')->with('success','Berhasil melakukan pendaftaran, silahkan Login');
    }

    public function login() 
    {
        $data = [ ];

        return view('depan.login.login',$data);
    }

    public function proseslogin(Request $request) {

        $nim = $request->nim;
        $password = $request->password;

        if (Auth::guard('mahasiswa')->attempt(['nim'=>$nim,'password'=>$password])) {
            return redirect()->route('web.depan')->with('success',"Anda berhasil login");
        } else {
            return redirect()->back()->with('danger',"Maaf, Anda Gagal Login</strong>");
        }
       
        return redirect()->back()->with('danger',"<strong>Maaf, Anda Gagal Login</strong>");
    }

    public function logoutproses() {
         if(Auth::guard('mahasiswa')->check()) {
            Auth::guard('mahasiswa')->logout();
        }

         return redirect()->route('web.depan')->with('success',"Anda berhasil keluar/logout");
    }
   
}
