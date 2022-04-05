<?php

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::post('/action', function () {
    return view('action');
});

Route::get('/action', function () {
    return view('action');
});

Route::get('/tests', function () {
    return view('view/tests');
});

Route::get('form', 'formcontroller@create')->name('form.create');
Route::post('form', 'formcontroller@store')->name('form.store');

require __DIR__.'/auth.php';