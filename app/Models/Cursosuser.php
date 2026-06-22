<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cursosuser extends Model
{
    protected $fillable = [
        'user_id',
        'curso_id',
    ];
}
