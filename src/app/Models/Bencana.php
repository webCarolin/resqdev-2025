<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bencana extends Model
{
    protected $fillable = [
        'nama_bencana',
        'lokasi',
        'status',
    ];
}
