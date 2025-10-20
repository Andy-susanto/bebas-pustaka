<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    private $title = 'Pengguna Aplikasi';
    private $folder = 'adm.admin';
    private $route = 'admin';
    private $routeindex = 'admin.index';

    public function index()
    {
        $data = [
            'title' => $this->title,
            'linkform' => route($this->route.'.create'),
            'linkedit' => $this->route.'.edit',
            'linkdestroy' => $this->route.'.destroy',
            'tabel' => Admin::all()
        ];
        
        return view($this->folder.'.tabel',$data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah '.$this->title,
            'link' => route($this->routeindex),
            'route' => $this->route.'.store',
            'method' => 'POST',
            'data' => new Admin(),
        ];
        return view($this->folder.'.form',$data);
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'nama' => 'required|unique:admin',
                'username' => 'required|unique:admin',
                'password' => 'required',
                'level' => 'required'
            ],
            [
                'nama.required' => 'Nama harus diisi',
                'nama.unique' => 'Nama sudah digunakan harus diisi',
                'username.required' => 'Username harus diisi',
                'username.unique' => 'Username sudah digunakan',
                'password.required' => 'Password harus diisi',
                'level.required' => 'Level harus diisi',
            ]
        );

        $admin = new Admin();
        $admin->nama = $request->nama;
        $admin->username = $request->username;
        $admin->password = Hash::make($request->password);
        $admin->level = $request->level;
        $admin->save();

        return redirect()
            ->route($this->routeindex)
            ->with('success','Berhasil simpan '.$this->title);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Ubah '.$this->title,
            'link' => route($this->routeindex),
            'route' => $this->route.'.update',
            'method' => 'PATCH',
            'data' => Admin::findOrFail($id),
        ];
        return view($this->folder.'.form',$data);
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'nama' => 'required|unique:admin,nama,'.$id,
                'username' => 'required|unique:admin,username,'.$id,
                'level' => 'required'
            ],
            [
                'nama.required' => 'Nama harus diisi',
                'nama.unique' => 'Nama sudah digunakan harus diisi',
                'username.required' => 'Username harus diisi',
                'username.unique' => 'Username sudah digunakan',
                'level.required' => 'Level harus diisi',
            ]
        );

        $admin = Admin::findOrFail($id);
        
        $admin->nama = $request->nama;
        $admin->username = $request->username;
        $admin->level = $request->level;
        if($request->password) {
            $admin->password = Hash::make($request->password);
        }
        $admin->save();

        return redirect()
            ->route($this->routeindex)
            ->with('success','Berhasil ubah data '.$this->title);
    }

    public function destroy($id)
    {
        Admin::findOrFail($id)->delete();
        
        return redirect()
            ->route($this->routeindex)
            ->with('danger','Berhasil hapus '.$this->title);
    }
}
