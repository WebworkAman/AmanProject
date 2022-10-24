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
    return view('home');
});

Route::get('/pb', function () {
    return view('pb');
});

Route::get('/cutting', function () {
    return view('cutting');
});
Route::get('/folding', function () {
    return view('folding');
});

Route::get('/fusingPress', function () {
    return view('fusingPress');
});

Route::get('/heatTransfer', function () {
    return view('heatTransfer');
});

Route::get('/inspection', function () {
    return view('inspection');
});

Route::get('/ironing', function () {
    return view('ironing');
});

Route::get('/needle', function () {
    return view('needle');
});

Route::get('/packaging', function () {
    return view('packaging');
});

Route::get('/relaxing', function () {
    return view('relaxing');
});

Route::get('/seamless', function () {
    return view('seamless');
});

Route::get('/spreading', function () {
    return view('spreading');
});