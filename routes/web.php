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

use App\Http\Controllers\MessageController;
use App\Http\Controllers\ViewController;

Route::get('/', [PageController::class,'home']);

//會員登入
Route::prefix('members')->name('members.')->group(function () {
    Route::resource('/',MemberController::class)->only(['create','store']);
    Route::delete('/session',[MemberSessionController::class,'delete'])->name('session.delete');
    Route::resource('session',MemberSessionController::class)->only([
        'create',
        'store',
    ]);
});

//管理者登入
Route::get('/admin',function(){
     return view('admin/login');
});
Route::get('/admin/index',function(){
    return view('admin/index');
});
Route::get('/admin/question_edit',function(){
    return view('admin/question_edit');
});
Route::get('/admin/question_select',function(){
    return view('admin/question_select');
});

// Route::get('/OC40N02', function () {
//     return view('OC40N02');
// });

Route::post('/OC40N02',MessageController::class)->name('post');
Route::get('/OC40N02',ViewController::class)->name('view');
// Forgot password

// Route::get('/forgot',function index(){
    
//     return view('./members/forgotPW');
// });


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
Route::prefix('controls')->name('controls.')->middleware(['member.auth'])->group(function(){
    Route::get('/',[ControlsPageController::class,'home'])->name('home');
});

//層級下一種寫法
// Route::prefix('controls')->name('controls.')->group(function () {
//     Route::get('/',['App\Http\Controllers\Controls\PageController','home'])->name('home');
// }); 

//第二種
// Route::prefix('controls')->name('controls.')->group(function () {
//     Route::get('/',[ControlsPageController::class,'home'])->name('home');
// }); 


// require _DIR_.'/auth.php';

