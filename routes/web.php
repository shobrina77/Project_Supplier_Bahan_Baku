<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SupplierController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return redirect('/supplier');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('supplier', SupplierController::class)->middleware('auth');

require __DIR__.'/auth.php';