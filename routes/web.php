<?php


use App\Models\ProductType;
use Illuminate\Support\Facades\Route;

Route::view('/', 'dashboard')->name('home');
Route::view('/template', 'template')->name('template');
Route::view('/contact', 'contact')->name('contact');

Route::get('auth/callback/twitter', function(){
    return 'hai';
});

Route::get('test', function(){
  $productType = ProductType::find(1)?->name;
  dd($productType); 
});

require __DIR__.'/auth.php';
