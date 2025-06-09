<?php

use App\Http\Controllers\LibroController;
use App\Models\Ejemplar;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::resource('libros', LibroController::class);

Route::get('ejemplares/{id}', function($id){
    return view('ejemplares.show', [
        'ejemplar' => Ejemplar::with('prestamos', 'libro')-> where('id', $id)->first()
    ]);
})->name('ejemplares.show');

require __DIR__.'/auth.php';
