<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use App\Models\Pengaturan as model;
use Illuminate\Http\Request;

class PengaturanController extends Controller
{
    private $title = 'Pengaturan';
    private $folder = 'adm.pengaturan';
    private $route = 'pengaturan';
    private $routeindex = 'pengaturan.index';

    public function index()
    {
        $data = [
            'title' => $this->title,
            'linkform' => route($this->route.'.create'),
            'linkedit' => $this->route.'.edit',
            'linkdestroy' => $this->route.'.destroy',
            'tabel' => model::where('jenis','info')->get()
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
        ];
        return view($this->folder.'.form',$data);
    }

    public function store(Request $request)
    {
        
        $model = new model();
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
        ];
        return view($this->folder.'.form',$data);
    }

    public function update(Request $request, $id)
    {
        
        $model = model::findOrFail($id);
        $model->fill($request->all());
        $model->save();

        return redirect()
            ->route($this->routeindex)
            ->with('success','Berhasil ubah data '.$this->title);
    }

    public function destroy($id)
    {
       
    }
}
