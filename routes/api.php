<?php

use App\Http\Controllers\Cadastro\{
    CategoriaControll
    };
use Illuminate\Support\Facades\Route;

Route::apiResource('categoria', CategoriaControll::class);
