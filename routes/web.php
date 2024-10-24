<?php

use App\Models\Website;
use App\Models\ProductType;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ProductController;

Route::view( '/', 'pages.home' )->name( 'home' );
Route::get( 'product', [ ProductController::class, 'index' ] )->name( 'product' );
Route::get( 'product/{slug}', [ ProductController::class, 'detail' ] )->name( 'product.detail' );
Route::view( '/template', 'pages.template' )->name( 'template' );
Route::view( '/contact', 'pages.contact' )->name( 'contact' );
Route::get( '/blog', [ BlogController::class, 'index' ] )->name( 'blog' );
Route::get( '/blog/{slug}', [ BlogController::class, 'detail' ] )->name( 'detail.blog' );
Route::get('pages/{slug}', function($slug){

    $website = Website::where('slug', $slug)->first(); 
    return view('website', ['website' => $website]); 

}); 

require __DIR__.'/auth.php';
