<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class Mahasiswa extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'mahasiswa';
    protected $guarded = [];

    static function getall() {
        $q = "SELECT mahasiswa.*,prodi.nama AS namaprodi 
            FROM mahasiswa INNER JOIN prodi ON mahasiswa.prodi_id = prodi.id 
            ORDER BY id";
        return collect(DB::select(DB::raw($q)));
    }
}