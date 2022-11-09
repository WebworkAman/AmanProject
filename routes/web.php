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
use App\Http\Controllers\UserController;
use App\Http\Controllers\Controls\PageController as ControlsPageController;

use App\Http\Controllers\MemberController;
use App\Http\Controllers\MemberSessionController;

Route::get('/', [PageController::class,'home']);


Route::prefix('members')->name('members.')->group(function () {
    Route::resource('/',MemberController::class)->only(['create','store']);
    Route::delete('/session',[MemberSessionController::class,'delete'])->name('session.delete');
    Route::resource('session',MemberSessionController::class)->only([
        'create',
        'store',
    ]);

}); 
 
// Route::get('/pb', [PageController::class,'pb']);
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

// == not logged in ==
//page
//products
//products/search
//users
//carts/index

// == logged in ==
// orders
//profile
//carts/purchase

// == admin ==
//crud
//controls/page
//controls/products
//controls/orders
//controls/brands
//controls/categories
//controls/users
//controls/carts

//層級下一種寫法
// Route::prefix('controls')->name('controls.')->group(function () {
//     Route::get('/',['App\Http\Controllers\Controls\PageController','home'])->name('home');
// }); 

//第二種
Route::prefix('controls')->name('controls.')->group(function () {
    Route::get('/',[ControlsPageController::class,'home'])->name('home');
}); 


// require _DIR_.'/auth.php';

