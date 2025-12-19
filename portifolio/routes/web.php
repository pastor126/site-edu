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
    header('X-Robots-Tag: all');
    return response('google.com, pub-3358995556254412, DIRECT, f08c47fec0942fa0')
        ->header('Content-Type', 'text/plain')
        ->header('X-Robots-Tag', 'all');
});

Route::get('/sitemap.xml', function () {
    $urls = [
        [
            'loc' => url('/'),
            'lastmod' => '2025-12-19',
            'changefreq' => 'yearly',
            'priority' => '1.0'
        ],
        [
            'loc' => url('/politica-privacidade'),
            'lastmod' => '2025-12-19',
            'changefreq' => 'yearly',
            'priority' => '0.8'
        ],
       
    ];
    
    return response()->view('sitemap', compact('urls'))
        ->header('Content-Type', 'application/xml');
});
