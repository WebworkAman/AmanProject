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

//<*--------  驗布 -----------*>

Route::get('/inspection', function () { 
return view('product/category/inspection');});

Route::post('/OC40N02',MessageController::class)->name('post');
Route::get('/OC40N02',ViewController::class)->name('view');

Route::post('/OC-1',MessageController::class);
Route::get('/OC-1',[ViewController::class,'OC1']);

Route::post('/OC-5B',MessageController::class);
Route::get('/OC-5B',[ViewController::class,'OC5B']);

Route::post('/OC-83',MessageController::class);
Route::get('/OC-83',[ViewController::class,'OC83']);

//<*--------  鬆布 -----------*>

Route::get('/relaxing', function () {
    return view('product/category/relaxing');
});

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

Route::get('/spreading', function () {
    return view('product/category/spreading');
});

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

Route::get('/cutting', function () {
    return view('product/category/cutting');
});

Route::post('/OneCut',MessageController::class);
Route::get('/OneCut',[ViewController::class,'OneCut']);

Route::post('/M6S',MessageController::class);
Route::get('/M6S',[ViewController::class,'M6S']);

Route::post('/TAC',MessageController::class);
Route::get('/TAC',[ViewController::class,'TAC']);

Route::post('/OC-510',MessageController::class);
Route::get('/OC-510',[ViewController::class,'OC510']);

Route::post('/OB-90',MessageController::class);
Route::get('/OB-90',[ViewController::class,'OB90']);

Route::post('/A-100U',MessageController::class);
Route::get('/A-100U',[ViewController::class,'A100U']);

Route::post('/LU-933',MessageController::class);
Route::get('/LU-933',[ViewController::class,'Lu933']);

Route::post('/OB-700A',MessageController::class);
Route::get('/OB-700A',[ViewController::class,'OB700A']);

// <*--------  整燙定型 -----------*>
Route::get('/ironing', function () {
    return view('product/category/ironing');
});

Route::post('/OP-800SDS',MessageController::class);
Route::get('/OP-800SDS',[ViewController::class,'OP800SDS']);

Route::post('/OP-87',MessageController::class);
Route::get('/OP-87',[ViewController::class,'OP87']);

Route::post('/OP-302',MessageController::class);
Route::get('/OP-302',[ViewController::class,'OP302']);

Route::post('/OP-301',MessageController::class);
Route::get('/OP-301',[ViewController::class,'OP301']);

Route::post('/OP-122A',MessageController::class);
Route::get('/OP-122A',[ViewController::class,'OP122A']);

Route::post('/OP-500',MessageController::class);
Route::get('/OP-500',[ViewController::class,'OP500']);

Route::post('/OP-606',MessageController::class);
Route::get('/OP-606',[ViewController::class,'OP606']);

Route::post('/OP-120T',MessageController::class);
Route::get('/OP-120T',[ViewController::class,'OP120T']);

Route::post('/OP-535',MessageController::class);
Route::get('/OP-535',[ViewController::class,'OP535']);

Route::post('/OP-565III',MessageController::class);
Route::get('/OP-565III',[ViewController::class,'OP565']);

Route::post('/OP-5881',MessageController::class);
Route::get('/OP-5881',[ViewController::class,'OP5881']);

Route::post('/OP-5851',MessageController::class);
Route::get('/OP-5851',[ViewController::class,'OP5851']);

// <*--------  轉印 -----------*>
Route::get('/heatTransfer', function () {
    return view('product/category/heatTransfer');
});

Route::post('/OP-10A5',MessageController::class);
Route::get('/OP-10A5',[ViewController::class,'OP10A5']);

Route::post('/OP-380A',MessageController::class);
Route::get('/OP-380A',[ViewController::class,'OP380A']);

Route::post('/OP-15A',MessageController::class);
Route::get('/OP-15A',[ViewController::class,'OP15A']);

Route::post('/OP-305S',MessageController::class);
Route::get('/OP-305S',[ViewController::class,'OP305S']);

Route::post('/OP-15A4',MessageController::class);
Route::get('/OP-15A4',[ViewController::class,'OP15A4']);

Route::post('/OS-5R',MessageController::class);
Route::get('/OS-5R',[ViewController::class,'OS5R']);

Route::post('/OP-54A',MessageController::class);
Route::get('/OP-54A',[ViewController::class,'OP54A']);

Route::post('/OP-251',MessageController::class);
Route::get('/OP-251',[ViewController::class,'OP251']);

Route::post('/OP-105A',MessageController::class);
Route::get('/OP-105A',[ViewController::class,'OP105A']);

Route::post('/OP-38AII',MessageController::class);
Route::get('/OP-38AII',[ViewController::class,'OP38AII']);

Route::post('/OP-5288',MessageController::class);
Route::get('/OP-5288',[ViewController::class,'OP5288']);


// <*--------  黏合 -----------*>

Route::get('/fusingPress', function () { 
    return view('product/category/fusingPress');
});

Route::post('/OP-450GS',MessageController::class);
Route::get('/OP-450GS',[ViewController::class,'OP450GS']);

Route::post('/OP-1200NL',MessageController::class);
Route::get('/OP-1200NL',[ViewController::class,'OP1200NL']);

Route::post('/OP-1400',MessageController::class);
Route::get('/OP-1400',[ViewController::class,'OP1400']);

Route::post('/OP-1000NE',MessageController::class);
Route::get('/OP-1000NE',[ViewController::class,'OP1000NE']);

Route::post('/OP-600N',MessageController::class);
Route::get('/OP-600N',[ViewController::class,'OP600N']);

Route::post('/OP-60LN',MessageController::class);
Route::get('/OP-60LN',[ViewController::class,'OP60LN']);

Route::post('/OP-600SP',MessageController::class);
Route::get('/OP-600SP',[ViewController::class,'OP600SP']);

Route::post('/OP-100LE',MessageController::class);
Route::get('/OP-100LE',[ViewController::class,'OP100LE']);

Route::post('/OP-600SPII',MessageController::class);
Route::get('/OP-600SPII',[ViewController::class,'OP600SPII']);

Route::post('/OP-900A',MessageController::class);
Route::get('/OP-900A',[ViewController::class,'OP900A']);

Route::post('/OP-600FA',MessageController::class);
Route::get('/OP-600FA',[ViewController::class,'OP600FA']);

Route::post('/Feeder',MessageController::class);
Route::get('/Feeder',[ViewController::class,'Feeder']);


// <*--------  無縫黏合 -----------*>
Route::get('/seamless', function () {
    return view('product/category/seamless');
});

Route::post('/MB9018B',MessageController::class);
Route::get('/MB9018B',[ViewController::class,'MB9018B']);

Route::post('/OP-114',MessageController::class);
Route::get('/OP-114',[ViewController::class,'OP114']);

Route::post('/OP-114S',MessageController::class);
Route::get('/OP-114S',[ViewController::class,'OP114S']);

Route::post('/OP-701HAS',MessageController::class);
Route::get('/OP-701HAS',[ViewController::class,'OP701HAS']);

Route::post('/OP-114-03',MessageController::class);
Route::get('/OP-114-03',[ViewController::class,'OP11403']);

Route::post('/OP-114-06',MessageController::class);
Route::get('/OP-114-06',[ViewController::class,'OP11406']);

Route::post('/OP-114-16',MessageController::class);
Route::get('OP-114-16',[ViewController::class,'OP11416']);

Route::post('/OP-115',MessageController::class);
Route::get('/OP-115',[ViewController::class,'OP115']);

Route::post('/OP-114-02',MessageController::class);
Route::get('/OP-114-02',[ViewController::class,'OP11402']);

Route::post('/OP-115CSN',MessageController::class);
Route::get('/OP-115CSN',[ViewController::class,'OP115CSN']);

Route::post('/OP-115-12T',MessageController::class);
Route::get('/OP-115-12T',[ViewController::class,'OP11512T']);

Route::post('/OP-806A',MessageController::class);
Route::get('/OP-806A',[ViewController::class,'OP806A']);

// <*--------  包裝 -----------*>

Route::get('/packaging', function () {
    return view('product/category/packaging');
});

Route::post('/OFC-1',MessageController::class);
Route::get('/OFC-1',[ViewController::class,'OFC1']);

Route::post('/OFC-450',MessageController::class);
Route::get('/OFC-450',[ViewController::class,'OFC450']);

Route::post('/OSZ-50',MessageController::class);
Route::get('/OSZ-50',[ViewController::class,'OSZ50']);

Route::post('/OSZ-K02',MessageController::class);
Route::get('/OSZ-K02',[ViewController::class,'OSZK02']);

Route::post('/OSZ-50X',MessageController::class);
Route::get('/OSZ-50X',[ViewController::class,'OSZ50X']);

Route::post('/OSZ-50N',MessageController::class);
Route::get('/OSZ-50N',[ViewController::class,'OSZ50N']);

Route::post('/OSZ-50XN',MessageController::class);
Route::get('/OSZ-50XN',[ViewController::class,'OSZ50XN']);


// <*--------  其他 -----------*>
Route::get('/others', function () {
    return view('product/category/others');
});

Route::post('/ON-5',MessageController::class);
Route::get('/ON-5',[ViewController::class,'ON5']);

Route::post('/ON-CM',MessageController::class);
Route::get('/ON-CM',[ViewController::class,'ONCM']);

Route::post('/WLS-301',MessageController::class);
Route::get('/WLS-301',[ViewController::class,'WLS301']);

Route::post('/OM-78',MessageController::class);
Route::get('/OM-78',[ViewController::class,'OM78']);

Route::post('/OB-201L',MessageController::class);
Route::get('/OB-201L',[ViewController::class,'OB201L']);

Route::post('/OP-408S',MessageController::class);
Route::get('/OP-408S',[ViewController::class,'OP408S']);

Route::post('/OP-747',MessageController::class);
Route::get('/OP-747',[ViewController::class,'OP747']);

Route::post('/OW-40',MessageController::class);
Route::get('/OW-40',[ViewController::class,'OW40']);

Route::post('/DS-FS',MessageController::class);
Route::get('/DS-FS',[ViewController::class,'DSFS']);

Route::post('/OP-102A',MessageController::class);
Route::get('/OP-102A',[ViewController::class,'OP102A']);
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


Route::get('/needle', function () {
    return view('needle');
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

