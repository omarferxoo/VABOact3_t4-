<?php

use App\Http\Controllers\CursoController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => redirect()->route('cursos.index'));
Route::resource('cursos', CursoController::class);
