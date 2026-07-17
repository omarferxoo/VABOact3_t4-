<?php

use App\Http\Controllers\CursoController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/cursos');
Route::resource('cursos', CursoController::class);
