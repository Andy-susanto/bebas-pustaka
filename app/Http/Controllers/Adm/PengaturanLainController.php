<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use App\Models\Pengaturan as model;
use Illuminate\Http\Request;

class PengaturanLainController extends Controller
{
    private $folder = 'adm.pengaturan';
    private $route = 'pengaturan';
    private $routeindex = 'pengaturan.index';

    public function index()
    {

    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        
    }

    public function show($id)
    {
        
    }

    public function edit($id)
    {
        $model = model::findOrFail($id);

        $data = [
            'title' => $model->nama,
            'link' => route($this->routeindex),
            'route' => $this->route.'.update',
            'method' => 'PATCH',
            'data' => $model,
        ];
        return view($this->folder.'.formlain',$data);
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
