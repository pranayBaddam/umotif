<?php

use App\Http\Controllers\ScreeningController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::controller(ScreeningController::class)->group(function () {
    Route::get('/screenings/create', 'create')->name('screenings.create');
    Route::post('/screenings', 'store')->name('screenings.store');
    Route::get('/screenings/{id}', 'show')->name('screenings.show');
    Route::get('/screenings', 'index')->name('screenings.index');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
