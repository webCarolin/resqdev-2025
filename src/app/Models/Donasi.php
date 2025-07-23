<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Donasi extends Model
{
    protected $fillable = [
        'jumlah_donasi',
        'tanggal_donasi',
        'bencana_id',
        'donatur_id',
    ];

    public function donatur(): BelongsTo
    {
        return $this->belongsTo(Donatur::class);
    }

    public function bencana(): BelongsTo
    {
        return $this->belongsTo(Bencana::class);
    }
}
