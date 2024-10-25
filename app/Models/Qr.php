<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Qr extends Model
{
    protected $fillable = [
        'isdinamico',
        'usuario_id',
        'nombre'
    ];

    public function links(): HasMany
    {
        return $this->hasMany(Link::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
