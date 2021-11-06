<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cupom extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'tipo',
        'valor',
        'dataIni',
        'dataFim',
        'pausado'
    ];

}
