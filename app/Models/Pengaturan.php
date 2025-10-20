<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaturan extends Model
{
    use HasFactory;
    protected $table = 'pengaturan';
    protected $guarded = [];


    static function namakabag() {
        return strip_tags(self::find(4)->deskripsi);
    }

    static function nipkabag() {
        return strip_tags(self::find(5)->deskripsi);
    }
}
