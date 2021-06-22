<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WorkersController;
use App\Http\Controllers\ContrahentsController;
use App\Http\Controllers\HoursController;
use App\Http\Controllers\BillingsController;


Route::resource('hours', HoursController::class);
Route::resource('billings', BillingsController::class);

Route::resource('workers', WorkersController::class);
Route::resource('contrahents', ContrahentsController::class);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();