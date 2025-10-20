<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa as model;
use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MahasiswaController extends Controller
{
    private $title = 'Mahasiswa';
    private $folder = 'adm.mahasiswa';
    private $route = 'mahasiswa';
    private $routeindex = 'mahasiswa.index';

    public function index()
    {
        $data = [
            'title' => $this->title,
            'linkform' => route($this->route.'.create'),
            'linkedit' => $this->route.'.edit',
            'linkdestroy' => $this->route.'.destroy',
            'tabel' => model::getall()
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
            'data' => new model(),
            'prodi' => Prodi::pluck('nama','id')
        ];
        return view($this->folder.'.form',$data);
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'nama' => 'required',
                'nim' => 'required|unique:mahasiswa',
                'prodi_id' => 'required',
                'alamat' => 'required',
                'notelp' => 'required|numeric|digits_between:12,13|unique:mahasiswa',
            ],
            [
                'nama.required' => 'Nama harus diisi',
                'nama.unique' => 'Nama sudah digunakan',
                'nim.required' => 'NIM harus diisi',
                'nim.unique' => 'NIM sudah digunakan',
                'prodi_id.required' => 'Prodi harus diisi',
                'notelp.required' => 'No Telp harus diisi',
                'notelp.unique' => 'No Telp sudah digunakan',
                'notelp.numeric' => 'No Telp harus angka',
                'digits_between' => 'Digit No Telp harus antara 12 sampai dengan 13',
                'alamat.required' => 'Alamat harus diisi',
            ]
        );

        $model = new model();
        
        $request->request->add([
            'password' => Hash::make($request->nim)
        ]);

        $model->fill($request->all());
        $model->save();

        return redirect()
            ->route($this->routeindex)
            ->with('success','Berhasil simpan data '.$this->title);
    }

    public function show($id)
    {
        
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Ubah '.$this->title,
            'link' => route($this->routeindex),
            'route' => $this->route.'.update',
            'method' => 'PATCH',
            'data' => model::findOrFail($id),
            'prodi' => Prodi::pluck('nama','id')
        ];
        return view($this->folder.'.form',$data);
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'nama' => 'required',
                'nim' => 'required|unique:mahasiswa,nim,'.$id,
                'prodi_id' => 'required',
                'alamat' => 'required',
                'notelp' => 'required|numeric|digits_between:12,13|unique:mahasiswa,notelp,'.$id,
            ],
            [
                'nama.required' => 'Nama harus diisi',
                'nama.unique' => 'Nama sudah digunakan',
                'nim.required' => 'NIM harus diisi',
                'nim.unique' => 'NIM sudah digunakan',
                'prodi_id.required' => 'Prodi harus diisi',
                'notelp.required' => 'No Telp harus diisi',
                'notelp.unique' => 'No Telp sudah digunakan',
                'notelp.numeric' => 'No Telp harus angka',
                'digits_between' => 'Digit No Telp harus antara 12 sampai dengan 13',
                'alamat.required' => 'Alamat harus diisi',
            ]
        );

        $model = model::findOrFail($id);
        $model->fill($request->all());
        $model->save();

        return redirect()
            ->route($this->routeindex)
            ->with('success','Berhasil ubah data '.$this->title);
    }

    public function destroy($id)
    {
        model::findOrFail($id)->delete();
        
        return redirect()
            ->route($this->routeindex)
            ->with('danger','Berhasil hapus data '.$this->title);
    }
}
