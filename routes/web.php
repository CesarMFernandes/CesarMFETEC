<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\AtividadeController;
use App\Http\Controllers\CursosuserController;
use App\Http\Controllers\CursoUserController;
use Illuminate\Support\Facades\Route;
use App\Models\Evento;

Route::get('/', function () {
    return view('landing');
});

Route::fallback(function () {
    return view('fallback');
});


Route::get('/dashboard', [EventoController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');
Route::get('/Eventos/Create', [EventoController::Class, 'create'])
    ->middleware('auth');
Route::post('/Eventos/Create', [EventoController::Class, 'store'])
    ->middleware('auth')
    ->name('eventos.create');
Route::delete('/Eventos/{evento}', [EventoController::class, 'destroy'])
    ->middleware('auth')
    ->name('eventos.destroy');
Route::get('/Eventos/{evento}/edit', [EventoController::class, 'edit'])
    ->middleware('auth')
    ->name('eventos.edit');
Route::put('/Eventos/{evento}', [EventoController::class, 'update'])
    ->middleware('auth')
    ->name('eventos.update');

Route::get('/Cursos', [CursoController::Class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('cursos');
Route::get('/Cursos/Create', [CursoController::Class, 'create'])
    ->middleware('auth');
Route::post('/Cursos/Create', [CursoController::class, 'store'])
    ->middleware('auth') 
    ->name('cursos.create');
Route::delete('/Cursos/{curso}', [CursoController::class, 'destroy'])
    ->middleware('auth')
    ->name('cursos.destroy');
Route::get('/Cursos/{curso}/edit', [CursoController::class, 'edit'])
    ->middleware('auth')
    ->name('cursos.edit');
Route::put('/Cursos/{curso}', [CursoController::class, 'update'])
    ->middleware('auth')
    ->name('cursos.update');

Route::get('/Atividades/{curso}', [AtividadeController::Class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('atividades');
Route::get('/Atividades/{curso}/Create', [AtividadeController::Class, 'create'])
    ->middleware('auth')
    ->name('atividades.formcreate');
Route::post('Atividades/{curso}/Create', [AtividadeController::class, 'store'])
    ->middleware('auth') 
    ->name('atividades.create');
Route::delete('/Atividades/{curso}/{atividade}', [AtividadeController::class, 'destroy'])
    ->middleware('auth')
    ->name('atividades.destroy');
Route::get('/Atividades/{curso}/{atividade}/edit', [AtividadeController::class, 'edit'])
    ->middleware('auth')
    ->name('atividades.edit');
Route::put('/Atividades/{curso}/{atividade}', [AtividadeController::class, 'update'])
    ->middleware('auth')
    ->name('atividades.update');

Route::post('Cursosusers/create', [CursosuserController::class, 'store'])
    ->middleware('auth') 
    ->name('matricula.create');
Route::delete('/Cursosusers/{curso}', [CursosuserController::class, 'destroy'])
    ->middleware('auth')
    ->name('matricula.destroy');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
