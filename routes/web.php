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

use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;

Route::get('/', function () {
    return view('home');
});

Route::get('/pb', [PageController::class,'pb']);
Route::get(
    '/product/{id}',
     [ProductController::class,'show']
    )->where('id','[0-9]+'); //0~999999

Route::resource('orders',OrderController::class); 


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

//會員登入／註冊

Route::get('/log', function () {
    return view('/layouts/log');
});

Route::get('/register', function () {
    return view('/layouts/register');
});

Route::get('/OC40N02', function () {
    return view('OC40N02');
});

