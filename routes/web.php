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
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\MemberSessionController;

use App\Http\Controllers\MessageController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\FAQController;




//會員登入 Members login -> group 
Route::prefix('members')->name('members.')->group(function () {
    Route::resource('/',MemberController::class)->only(['create','store']);
    Route::delete('/session',[MemberSessionController::class,'delete'])->name('session.delete');
    Route::resource('session',MemberSessionController::class)->only([
        'create',
        'store',
    ]);
});
//忘記密碼
Route::get('/forgot',[MemberSessionController::class,'showForgotForm'])->name('forgot');
Route::post('/forgot-password',[MemberSessionController::class,'sendResetLink'])->name('forgot-password');
//重設密碼
Route::get('/reset{token}',[MemberSessionController::class,'showResetForm'])->name('reset');
Route::post('/reset-password',[MemberSessionController::class,'resetPassword'])->name('reset-password');
//驗證
Route::get('/verify',[MemberController::class,'verify'])->name('verify');

//管理者登入 Admin login -> group

Route::group(['prefix'=>'admin'],function(){
   Route::get('/',[AdminController::class,'create'])->name('create');
   Route::post('/',[AdminController::class,'login'])->name('login');

   Route::get('index',function(){
       return view('admin/index');
   });
   Route::delete('/session',[AdminController::class,'delete'])->name('session.delete');
   Route::get('question_edit',function(){
       return view('admin/question_edit');
   });
   Route::get('question_select',function(){
       return view('admin/question_select');
   });
});

//登入首頁
// Route::get('/', [PageController::class,'home']);
//顯示產品系列
// Route::get(
//     '/{id}', 
//     [PageController::class,'home']
// )->where('id','[0-9]+');
// Route::get('/OC40N02', function () {
//     return view('OC40N02');
// });

//改寫 middleware group 寫法

Route::get('/',[PageController::class,'home'])->middleware('MemberAuthRedirect');

Route::middleware('MemberAuthRedirect')->group(function(){

Route::post('/OC40N02',MessageController::class)->name('post');
Route::get('/OC40N02',ViewController::class)->name('view');

Route::post('/OC-1',MessageController::class);
Route::get('/OC-1',[ViewController::class,'OC1']);

Route::post('/OC-5B',MessageController::class);
Route::get('/OC-5B',[ViewController::class,'OC5B']);

Route::post('/OC-83',MessageController::class);
Route::get('/OC-83',[ViewController::class,'OC83']);

Route::post('/UW-2',MessageController::class);
Route::get('/UW-2',[ViewController::class,'UW2']);

Route::post('/UW-2S',MessageController::class);
Route::get('/UW-2S',[ViewController::class,'UW2S']);

Route::post('/OC-100',MessageController::class);
Route::get('/OC-100',[ViewController::class,'OC100']);

Route::post('/OSP-2000II',MessageController::class);
Route::get('/OSP-2000II',[ViewController::class,'OSP2000II']);

Route::post('/OSP-2008',MessageController::class);
Route::get('/OSP-2008',[ViewController::class,'OSP2008']);

//<*--------  拉布 -----------*>

Route::post('/M190G',MessageController::class);
Route::get('/M190G',[ViewController::class,'M190G']);

Route::post('/J3',MessageController::class);
Route::get('/J3',[ViewController::class,'J3']);

Route::post('/KPro',MessageController::class);
Route::get('/KPro',[ViewController::class,'KPro']);

Route::post('/KProLite',MessageController::class);
Route::get('/KProLite',[ViewController::class,'KProLite']);

Route::post('/F8',MessageController::class);
Route::get('/F8',[ViewController::class,'F8']);

Route::post('/T5',MessageController::class);
Route::get('/T5',[ViewController::class,'T5']);

// <*--------  裁剪 -----------*>

Route::post('/OneCut',MessageController::class);
Route::get('/OneCut',[ViewController::class,'OneCut']);

Route::post('/M6S',MessageController::class);
Route::get('/M6S',[ViewController::class,'M6S']);

Route::post('/TAC',MessageController::class);
Route::get('/TAC',[ViewController::class,'TAC']);

Route::post('/OC510',MessageController::class);
Route::get('/OC510',[ViewController::class,'OC510']);

Route::post('/OB90',MessageController::class);
Route::get('/OB90',[ViewController::class,'OB90']);

Route::post('/A100U',MessageController::class);
Route::get('/A100U',[ViewController::class,'A100U']);

Route::post('/LU933',MessageController::class);
Route::get('/LU933',[ViewController::class,'Lu933']);

Route::post('/OB700A',MessageController::class);
Route::get('/OB700A',[ViewController::class,'OB700A']);

// <*--------  整燙定型 -----------*>

Route::post('/OP800',MessageController::class);
Route::get('/OP800',[ViewController::class,'OP800']);

Route::post('/OP87',MessageController::class);
Route::get('/OP87',[ViewController::class,'OP87']);

Route::post('/OP302',MessageController::class);
Route::get('/OP302',[ViewController::class,'OP302']);

Route::post('/OP301',MessageController::class);
Route::get('/OP301',[ViewController::class,'OP301']);

Route::post('/OP122A',MessageController::class);
Route::get('/OP122A',[ViewController::class,'OP122A']);

Route::post('/OP500',MessageController::class);
Route::get('/OP500',[ViewController::class,'OP500']);

Route::post('/OP606',MessageController::class);
Route::get('/OP606',[ViewController::class,'OP606']);

Route::post('/OP120T',MessageController::class);
Route::get('/OP120T',[ViewController::class,'OP120T']);

Route::post('/OP535',MessageController::class);
Route::get('/OP535',[ViewController::class,'OP535']);

Route::post('/OP565',MessageController::class);
Route::get('/OP565',[ViewController::class,'OP565']);

Route::post('/OP5881',MessageController::class);
Route::get('/OP5881',[ViewController::class,'OP5881']);

Route::post('/OP5851',MessageController::class);
Route::get('/OP5851',[ViewController::class,'OP5851']);

// <*--------  轉印 -----------*>

Route::post('/OneCut',MessageController::class);
Route::get('/OneCut',[ViewController::class,'OneCut']);

Route::post('/M6S',MessageController::class);
Route::get('/M6S',[ViewController::class,'M6S']);

Route::post('/TAC',MessageController::class);
Route::get('/TAC',[ViewController::class,'TAC']);

Route::post('/OC510',MessageController::class);
Route::get('/OC510',[ViewController::class,'OC510']);

Route::post('/OB90',MessageController::class);
Route::get('/OB90',[ViewController::class,'OB90']);

Route::post('/A100U',MessageController::class);
Route::get('/A100U',[ViewController::class,'A100U']);

Route::post('/LU933',MessageController::class);
Route::get('/LU933',[ViewController::class,'Lu933']);

Route::post('/OB700A',MessageController::class);
Route::get('/OB700A',[ViewController::class,'OB700A']);
});

// Forgot password

// Route::get('/forgot',function index(){
    
//     return view('./members/forgotPW');
// });


// Route::get('/pb', [PageController::class,'pb']);
Route::get(
    '/product/{id}',
     [ProductController::class,'show']
    )->where('id','[0-9]+'); //0~999999

// Route::resource('orders',OrderController::class); 

Route::get('/inspection', function () { 
    return view('product/category/inspection/inspection');
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


//常見問題
// Route::post('/FAQ',MessageController::class)->name('post');
Route::get('/FAQ/cutting',[FAQController::class,'create1'])->name('faqview');

Route::get('/FAQ/inspection',[FAQController::class,'create'])->name('faqview');

Route::get('/FAQ/relaxing',[FAQController::class,'create0'])->name('faqview');

Route::get('/FAQ/spreading',[FAQController::class,'create3'])->name('faqview');

Route::get('/FAQ/spreading',[FAQController::class,'create3'])->name('faqview');
// Route::get('/FAQ', function () {
//     return view('FAQ');
// });

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
// Route::prefix('controls')->name('controls.')->middleware(['member.auth'])->group(function(){
//     Route::get('/',[ControlsPageController::class,'home'])->name('home');
// });

//層級下一種寫法
// Route::prefix('controls')->name('controls.')->group(function () {
//     Route::get('/',['App\Http\Controllers\Controls\PageController','home'])->name('home');
// }); 

//第二種
// Route::prefix('controls')->name('controls.')->group(function () {
//     Route::get('/',[ControlsPageController::class,'home'])->name('home');
// }); 


// require _DIR_.'/auth.php';

