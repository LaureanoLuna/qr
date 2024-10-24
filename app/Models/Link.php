<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Link extends Model
{
    protected $fillable = [
        'qr_id',
        'url',
        'deshabilitado'
    ];

    public function qr(): BelongsTo
    {
        return $this->belongsTo(Qr::class);
    }
}
