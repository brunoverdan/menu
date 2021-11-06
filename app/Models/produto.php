<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'imagem',
        'pausado',
        'grupo_id',
        'valor',
        'descricao'
    ];

}
