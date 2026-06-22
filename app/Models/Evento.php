<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Evento extends Model
{
    protected $fillable = [
        'titulo',
        'texto',
        'caminho_img',
        'hora_evento',
    ];

    protected $casts =[
        'hora_evento' => 'datetime',
    ];

    public function user():BelongsTo{
        return $this->belongsTo(User::class);
    }
}
