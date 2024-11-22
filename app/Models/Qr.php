<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Qr extends Model
{
    use HasUuids;
    protected $fillable = [
        'isdinamico',
        'tipo',
        'tamanio',
        'color',
        'fondo',
        'tipoFondo',
        'img',
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
