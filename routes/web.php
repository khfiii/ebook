<?php


use App\Enums\ProductType;
use Illuminate\Support\Facades\Route;

Route::view('/', 'dashboard')->name('home');
Route::view('/template', 'template')->name('template');
Route::view('/contact', 'contact')->name('contact');
require __DIR__.'/auth.php';
