<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Bebaspustakafile extends Model
{
    use HasFactory;

    protected $table = 'bebaspustakafile';
    protected $guarded = [];
}
