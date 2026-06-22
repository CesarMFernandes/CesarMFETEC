<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Atividade extends Model
{
    protected $fillable = [
        'texto',
        'hora_entrega',
        'curso_id',
    ];

    protected $casts =[
        'hora_entrega' => 'datetime',
    ];

    public function user():BelongsTo{
        return $this->belongsTo(User::class);
    }
}
