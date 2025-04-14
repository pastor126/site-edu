<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/politica-privacidade', function () {
    return view('politica-privacidade');
});

Route::get('/app-ads.txt', function () {
    return response('google.com, pub-3358995556254412, DIRECT, f08c47fec0942fa0')
        ->header('Content-Type', 'text/plain');
});
