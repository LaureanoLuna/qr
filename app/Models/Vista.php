<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vista extends Model
{
    protected $fillable = [
        'qr_id',
        'link_id',
        'locacion',
    ];
}
