<?php

use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\NoticiaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('noticias', NoticiaController::class );
    Route::resource('comentarios', ComentarioController::class);
    Route::post('/noticias/{noticia}/menear', [NoticiaController::class, 'menear'])->name('noticias.menear');
    Route::get('/noticias/{noticia}/desmenear', [NoticiaController::class, 'desmenear'])->name('noticias.desmenear');
    Route::post('/comentarios/subcomentar', [ComentarioController::class, 'subcomentar'])->name('comentarios.subcomentar');




});

require __DIR__.'/auth.php';
