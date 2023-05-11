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
use App\Http\Controllers\QuestionController;



//管理者登入 Admin login -> group

Route::group(['prefix'=>'admin'],function(){
    Route::get('/',[AdminController::class,'create'])->name('create');
    Route::post('/',[AdminController::class,'login'])->name('login');
 
    Route::get('index',function(){

        return view('admin/index');
    });
    // 常見問題區管理
    Route::get('/index', [FAQController::class, 'index'])->name('faqs.index');
    Route::get('/index/question-list', [AdminController::class, 'QuestionList'])->name('questions.index');
    Route::get('/index/question-list/{question}/reply', [QuestionController::class, 'reply'])->name('question.answer');
    // Route::post('/index/question-list/{question}/reply', [QuestionController::class, 'storeReply'])->name('question.storeReply');
    Route::post('/index/question-list/{question}/reply', [QuestionController::class, 'storeReply'])->name('question.storeReply');

    Route::get('/index/faq-list', [AdminController::class, 'faqList']);
    Route::get('/FAQ/create', [FAQController::class, 'create'])->name('faqs.create');
    Route::post('/FAQ/create', [FAQController::class, 'store'])->name('faqs.store');
    Route::delete('/index/{faq}', [FAQController::class, 'destroy'])->name('faqs.destroy');
    Route::delete('/index/question-list/{question}', [QuestionController::class, 'destroy'])->name('questions.destroy');

    Route::delete('/session',[AdminController::class,'delete'])->name('admin.session.delete');
    
    
    
    Route::get('question_select',function(){
        return view('admin/question_select');
    });
 });

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

// Route::get('/OC40N02',ViewController::class)->name('view');

Route::get('/OC40N02',ProductController::class)->name('view');
Route::post('/OC40N02',[QuestionController::class,'store'])->name('OC40N02');
// Route::get('/{product_title}', [ProductController::class, 'showProduct'])->name('products.show');
// Route::get('/{product_title}',[ProductController::class,'showProduct'])->where('product_name','[a-zA-Z0-9]+');
// Route::post('/OC40N02',MessageController::class)->name('post');
// Route::get('/OC40N02',ViewController::class)->name('view');

Route::post('/OC-1',[QuestionController::class,'store'])->name('OC-1');
Route::get('/OC-1',[ViewController::class,'OC1']);

Route::post('/OC-5B',[QuestionController::class,'store'])->name('OC-5B');
Route::get('/OC-5B',[ViewController::class,'OC5B']);

Route::post('/OC-83',[QuestionController::class,'store'])->name('OC-83');
Route::get('/OC-83',[ViewController::class,'OC83']);

//<*--------  鬆布 -----------*>

Route::get('/relaxing', function () {
    return view('product/category/relaxing');
});

Route::post('/UW-2',[QuestionController::class,'store'])->name('UW-2');
Route::get('/UW-2',[ViewController::class,'UW2']);

Route::post('/UW-2S',[QuestionController::class,'store'])->name('UW-2S');
Route::get('/UW-2S',[ViewController::class,'UW2S']);

Route::post('/OC-100',[QuestionController::class,'store'])->name('OC-100');
Route::get('/OC-100',[ViewController::class,'OC100']);

Route::post('/OSP-2000II',[QuestionController::class,'store'])->name('OSP-2000II');
Route::get('/OSP-2000II',[ViewController::class,'OSP2000II']);

Route::post('/OSP-2008',[QuestionController::class,'store'])->name('OSP-2008');
Route::get('/OSP-2008',[ViewController::class,'OSP2008']);

//<*--------  拉布 -----------*>

Route::get('/spreading', function () {
    return view('product/category/spreading');
});

Route::post('/M190G',[QuestionController::class,'store'])->name('M190G');
Route::get('/M190G',[ViewController::class,'M190G']);

Route::post('/J3',[QuestionController::class,'store'])->name('J3');
Route::get('/J3',[ViewController::class,'J3']);

Route::post('/KPro',[QuestionController::class,'store'])->name('KPro');
Route::get('/KPro',[ViewController::class,'KPro']);

Route::post('/KProLite',[QuestionController::class,'store'])->name('KProLite');
Route::get('/KProLite',[ViewController::class,'KProLite']);

Route::post('/F8',[QuestionController::class,'store'])->name('F8');
Route::get('/F8',[ViewController::class,'F8']);

Route::post('/T5',[QuestionController::class,'store'])->name('T5');
Route::get('/T5',[ViewController::class,'T5']);

// <*--------  裁剪 -----------*>

Route::get('/cutting', function () {
    return view('product/category/cutting');
});

Route::post('/OneCut',[QuestionController::class,'store'])->name('UW-2S');
Route::get('/OneCut',[ViewController::class,'OneCut']);

Route::post('/M6S',[QuestionController::class,'store'])->name('UW-2S');
Route::get('/M6S',[ViewController::class,'M6S']);

Route::post('/TAC',[QuestionController::class,'store'])->name('post');
Route::get('/TAC',[ViewController::class,'TAC']);

Route::post('/OC-510',[QuestionController::class,'store'])->name('UW-2S');
Route::get('/OC-510',[ViewController::class,'OC510']);

Route::post('/OB-90',[QuestionController::class,'store'])->name('UW-2S');
Route::get('/OB-90',[ViewController::class,'OB90']);

Route::post('/A-100U',[QuestionController::class,'store'])->name('UW-2S');
Route::get('/A-100U',[ViewController::class,'A100U']);

Route::post('/LU-933',[QuestionController::class,'store'])->name('UW-2S');
Route::get('/LU-933',[ViewController::class,'Lu933']);

Route::post('/OB-700A',[QuestionController::class,'store'])->name('UW-2S');
Route::get('/OB-700A',[ViewController::class,'OB700A']);

// <*--------  整燙定型 -----------*>
Route::get('/ironing', function () {
    return view('product/category/ironing');
});

Route::post('/OP-800SDS',[QuestionController::class,'store'])->name('UW-2S');
Route::get('/OP-800SDS',[ViewController::class,'OP800SDS']);

Route::post('/OP-87',[QuestionController::class,'store'])->name('UW-2S');
Route::get('/OP-87',[ViewController::class,'OP87']);

Route::post('/OP-302',[QuestionController::class,'store'])->name('UW-2S');
Route::get('/OP-302',[ViewController::class,'OP302']);

Route::post('/OP-301',[QuestionController::class,'store'])->name('UW-2S');
Route::get('/OP-301',[ViewController::class,'OP301']);

Route::post('/OP-122A',[QuestionController::class,'store'])->name('UW-2S');
Route::get('/OP-122A',[ViewController::class,'OP122A']);

Route::post('/OP-500',[QuestionController::class,'store'])->name('UW-2S');
Route::get('/OP-500',[ViewController::class,'OP500']);

Route::post('/OP-606',[QuestionController::class,'store'])->name('UW-2S');
Route::get('/OP-606',[ViewController::class,'OP606']);

Route::post('/OP-120T',[QuestionController::class,'store'])->name('UW-2S');
Route::get('/OP-120T',[ViewController::class,'OP120T']);

Route::post('/OP-535',[QuestionController::class,'store'])->name('UW-2S');
Route::get('/OP-535',[ViewController::class,'OP535']);

Route::post('/OP-565III',[QuestionController::class,'store'])->name('UW-2S');
Route::get('/OP-565III',[ViewController::class,'OP565']);

Route::post('/OP-5881',[QuestionController::class,'store'])->name('UW-2S');
Route::get('/OP-5881',[ViewController::class,'OP5881']);

Route::post('/OP-5851',[QuestionController::class,'store'])->name('UW-2S');
Route::get('/OP-5851',[ViewController::class,'OP5851']);

// <*--------  轉印 -----------*>
Route::get('/heatTransfer', function () {
    return view('product/category/heatTransfer');
});

Route::post('/OP-10A5',[QuestionController::class,'store'])->name('UW-2S');
Route::get('/OP-10A5',[ViewController::class,'OP10A5']);

Route::post('/OP-380A',[QuestionController::class,'store'])->name('UW-2S');
Route::get('/OP-380A',[ViewController::class,'OP380A']);

Route::post('/OP-15A',[QuestionController::class,'store'])->name('UW-2S');
Route::get('/OP-15A',[ViewController::class,'OP15A']);

Route::post('/OP-305S',[QuestionController::class,'store'])->name('UW-2S');
Route::get('/OP-305S',[ViewController::class,'OP305S']);

Route::post('/OP-15A4',[QuestionController::class,'store'])->name('UW-2S');
Route::get('/OP-15A4',[ViewController::class,'OP15A4']);

Route::post('/OS-5R',[QuestionController::class,'store'])->name('UW-2S');
Route::get('/OS-5R',[ViewController::class,'OS5R']);

Route::post('/OP-54A',[QuestionController::class,'store'])->name('UW-2S');
Route::get('/OP-54A',[ViewController::class,'OP54A']);

Route::post('/OP-251',[QuestionController::class,'store'])->name('UW-2S');
Route::get('/OP-251',[ViewController::class,'OP251']);

Route::post('/OP-105A',[QuestionController::class,'store'])->name('UW-2S');
Route::get('/OP-105A',[ViewController::class,'OP105A']);

Route::post('/OP-38AII',[QuestionController::class,'store'])->name('UW-2S');
Route::get('/OP-38AII',[ViewController::class,'OP38AII']);

Route::post('/OP-5288',[QuestionController::class,'store'])->name('UW-2S');
Route::get('/OP-5288',[ViewController::class,'OP5288']);


// <*--------  黏合 -----------*>

Route::get('/fusingPress', function () { 
    return view('product/category/fusingPress');
});

Route::post('/OP-450GS',[QuestionController::class,'store'])->name('UW-2S');
Route::get('/OP-450GS',[ViewController::class,'OP450GS']);

Route::post('/OP-1200NL',[QuestionController::class,'store'])->name('UW-2S');
Route::get('/OP-1200NL',[ViewController::class,'OP1200NL']);

Route::post('/OP-1400',[QuestionController::class,'store'])->name('UW-2S');
Route::get('/OP-1400',[ViewController::class,'OP1400']);

Route::post('/OP-1000NE',[QuestionController::class,'store'])->name('UW-2S');
Route::get('/OP-1000NE',[ViewController::class,'OP1000NE']);

Route::post('/OP-600N',[QuestionController::class,'store'])->name('UW-2S');
Route::get('/OP-600N',[ViewController::class,'OP600N']);

Route::post('/OP-60LN',[QuestionController::class,'store'])->name('UW-2S');
Route::get('/OP-60LN',[ViewController::class,'OP60LN']);

Route::post('/OP-600SP',[QuestionController::class,'store'])->name('UW-2S');
Route::get('/OP-600SP',[ViewController::class,'OP600SP']);

Route::post('/OP-100LE',[QuestionController::class,'store'])->name('UW-2S');
Route::get('/OP-100LE',[ViewController::class,'OP100LE']);

Route::post('/OP-600SPII',[QuestionController::class,'store'])->name('UW-2S');
Route::get('/OP-600SPII',[ViewController::class,'OP600SPII']);

Route::post('/OP-900A',[QuestionController::class,'store'])->name('UW-2S');
Route::get('/OP-900A',[ViewController::class,'OP900A']);

Route::post('/OP-600FA',[QuestionController::class,'store'])->name('UW-2S');
Route::get('/OP-600FA',[ViewController::class,'OP600FA']);

Route::post('/Feeder',[QuestionController::class,'store'])->name('UW-2S');
Route::get('/Feeder',[ViewController::class,'Feeder']);


// <*--------  無縫黏合 -----------*>
Route::get('/seamless', function () {
    return view('product/category/seamless');
});

Route::post('/MB9018B',[QuestionController::class,'store'])->name('UW-2S');
Route::get('/MB9018B',[ViewController::class,'MB9018B']);

Route::post('/OP-114',[QuestionController::class,'store'])->name('UW-2S');
Route::get('/OP-114',[ViewController::class,'OP114']);

Route::post('/OP-114S',[QuestionController::class,'store'])->name('UW-2S');
Route::get('/OP-114S',[ViewController::class,'OP114S']);

Route::post('/OP-701HAS',[QuestionController::class,'store'])->name('UW-2S');
Route::get('/OP-701HAS',[ViewController::class,'OP701HAS']);

Route::post('/OP-114-03',[QuestionController::class,'store'])->name('UW-2S');
Route::get('/OP-114-03',[ViewController::class,'OP11403']);

Route::post('/OP-114-06',[QuestionController::class,'store'])->name('UW-2S');
Route::get('/OP-114-06',[ViewController::class,'OP11406']);

Route::post('/OP-114-16',[QuestionController::class,'store'])->name('UW-2S');
Route::get('OP-114-16',[ViewController::class,'OP11416']);

Route::post('/OP-115',[QuestionController::class,'store'])->name('UW-2S');
Route::get('/OP-115',[ViewController::class,'OP115']);

Route::post('/OP-114-02',[QuestionController::class,'store'])->name('UW-2S');
Route::get('/OP-114-02',[ViewController::class,'OP11402']);

Route::post('/OP-115CSN',[QuestionController::class,'store'])->name('UW-2S');
Route::get('/OP-115CSN',[ViewController::class,'OP115CSN']);

Route::post('/OP-115-12T',[QuestionController::class,'store'])->name('UW-2S');
Route::get('/OP-115-12T',[ViewController::class,'OP11512T']);

Route::post('/OP-806A',[QuestionController::class,'store'])->name('UW-2S');
Route::get('/OP-806A',[ViewController::class,'OP806A']);

// <*--------  包裝 -----------*>

Route::get('/packaging', function () {
    return view('product/category/packaging');
});

Route::post('/OFC-1',[QuestionController::class,'store'])->name('UW-2S');
Route::get('/OFC-1',[ViewController::class,'OFC1']);

Route::post('/OFC-450',[QuestionController::class,'store'])->name('UW-2S');
Route::get('/OFC-450',[ViewController::class,'OFC450']);

Route::post('/OSZ-50',[QuestionController::class,'store'])->name('UW-2S');
Route::get('/OSZ-50',[ViewController::class,'OSZ50']);

Route::post('/OSZ-K02',[QuestionController::class,'store'])->name('UW-2S');
Route::get('/OSZ-K02',[ViewController::class,'OSZK02']);

Route::post('/OSZ-50X',[QuestionController::class,'store'])->name('UW-2S');
Route::get('/OSZ-50X',[ViewController::class,'OSZ50X']);

Route::post('/OSZ-50N',[QuestionController::class,'store'])->name('UW-2S');
Route::get('/OSZ-50N',[ViewController::class,'OSZ50N']);

Route::post('/OSZ-50XN',[QuestionController::class,'store'])->name('UW-2S');
Route::get('/OSZ-50XN',[ViewController::class,'OSZ50XN']);

// <*--------  金屬、重量檢測 -----------*>

Route::get('/needleWeighing', function () {
    return view('product/category/needleWeighing');
});
// 成衣
Route::get('/needleWeighing/clothing', function () {
    return view('product/category/needleWeighing/clothing');
});
Route::post('/needleWeighing/clothing/ON-688CD6',[QuestionController::class,'store'])->name('UW-2S');
Route::get('/needleWeighing/clothing/ON-688CD6',[ViewController::class,'ON688CD6']);

Route::post('/needleWeighing/clothing/OMW-600',[QuestionController::class,'store'])->name('UW-2S');
Route::get('/needleWeighing/clothing/OMW-600',[ViewController::class,'OMW600']);

Route::post('/needleWeighing/clothing/ON-30',[QuestionController::class,'store'])->name('UW-2S');
Route::get('/needleWeighing/clothing/ON-30',[ViewController::class,'ON30']);

Route::post('/needleWeighing/clothing/ON-688P',[QuestionController::class,'store'])->name('UW-2S');
Route::get('/needleWeighing/clothing/ON-688P',[ViewController::class,'ON688P']);

// 食品

Route::get('/needleWeighing/FoodBeverage', function () {
    return view('product/category/needleWeighing/FoodBeverage');
});

Route::post('/needleWeighing/FoodBeverage/CWL-300',[QuestionController::class,'store'])->name('UW-2S');
Route::get('/needleWeighing/FoodBeverage/CWL-300',[ViewController::class,'CWL300']);

Route::post('/needleWeighing/FoodBeverage/MD-400',[QuestionController::class,'store'])->name('UW-2S');
Route::get('/needleWeighing/FoodBeverage/MD-400',[ViewController::class,'MD400']);

Route::post('/needleWeighing/FoodBeverage/CW-150',[QuestionController::class,'store'])->name('UW-2S');
Route::get('/needleWeighing/FoodBeverage/CW-150',[ViewController::class,'CW150']);

// 一般大眾

Route::get('/needleWeighing/General', function () {
    return view('product/category/needleWeighing/General');
});

Route::post('/needleWeighing/General/ON-003',[QuestionController::class,'store'])->name('UW-2S');
Route::get('/needleWeighing/General/ON-003',[ViewController::class,'ON003']);

// <*--------  鍋爐 -----------*>
Route::get('/Boiler', function () {
    return view('product/category/Boiler');
});

//電蒸氣

Route::get('/Boiler/ElectricSteam', function () {
    return view('product/category/Boiler/ElectricSteam');
});

Route::post('/Boiler/ElectricSteam/WDR',[QuestionController::class,'store'])->name('UW-2S');
Route::get('/Boiler/ElectricSteam/WDR',[ViewController::class,'WDR']);

Route::post('/Boiler/ElectricSteam/LDR',[QuestionController::class,'store'])->name('UW-2S');
Route::get('/Boiler/ElectricSteam/LDR',[ViewController::class,'LDR']);

//燃氣

Route::get('/Boiler/GasFired', function () {
    return view('product/category/Boiler/GasFired');
});

Route::post('/Boiler/GasFired/WNS',[QuestionController::class,'store'])->name('UW-2S');
Route::get('/Boiler/GasFired/WNS',[ViewController::class,'WNS']);

Route::post('/Boiler/GasFired/WNS-Internal',[QuestionController::class,'store'])->name('UW-2S');
Route::get('/Boiler/GasFired/WNS-Internal',[ViewController::class,'WNSInternal']);

Route::post('/Boiler/GasFired/LSS',[QuestionController::class,'store'])->name('UW-2S');
Route::get('/Boiler/GasFired/LSS',[ViewController::class,'LSS']);

Route::post('/Boiler/GasFired/CWNS',[QuestionController::class,'store'])->name('UW-2S');
Route::get('/Boiler/GasFired/CWNS',[ViewController::class,'CWNS']);

Route::post('/Boiler/GasFired/CWNSJ',[QuestionController::class,'store'])->name('UW-2S');
Route::get('/Boiler/GasFired/CWNSJ',[ViewController::class,'CWNSJ']);

//燃油

Route::get('/Boiler/OilFired', function () {
    return view('product/category/Boiler/OilFired');
});

Route::post('/Boiler/OilFired/WNS-Internal',[QuestionController::class,'store'])->name('UW-2S');
Route::get('/Boiler/OilFired/WNS-Internal',[ViewController::class,'Oil_WNSInternal']);

Route::post('/Boiler/OilFired/LSS',[QuestionController::class,'store'])->name('UW-2S');
Route::get('/Boiler/OilFired/LSS',[ViewController::class,'Oil_LSS']);

Route::post('/Boiler/OilFired/CWNS',[QuestionController::class,'store'])->name('UW-2S');
Route::get('/Boiler/OilFired/CWNS',[ViewController::class,'Oil_CWNS']);

Route::post('/Boiler/OilFired/CWNSJ',[QuestionController::class,'store'])->name('UW-2S');
Route::get('/Boiler/OilFired/CWNSJ',[ViewController::class,'Oil_CWNSJ']);

//生物質

Route::get('/Boiler/Biomass', function () {
    return view('product/category/Boiler/Biomass');
});

Route::post('/Boiler/Biomass/WNS',[QuestionController::class,'store'])->name('UW-2S');
Route::get('/Boiler/Biomass/WNS',[ViewController::class,'Bio_WNS']);

Route::post('/Boiler/Biomass/LSS',[QuestionController::class,'store'])->name('UW-2S');
Route::get('/Boiler/Biomass/LSS',[ViewController::class,'Bio_LSS']);

Route::post('/Boiler/Biomass/LSG',[QuestionController::class,'store'])->name('UW-2S');
Route::get('/Boiler/Biomass/LSG',[ViewController::class,'Bio_LSG']);

Route::post('/Boiler/Biomass/DZL',[QuestionController::class,'store'])->name('UW-2S');
Route::get('/Boiler/Biomass/DZL',[ViewController::class,'Bio_DZL']);

Route::post('/Boiler/Biomass/SZL',[QuestionController::class,'store'])->name('UW-2S');
Route::get('/Boiler/Biomass/SZL',[ViewController::class,'Bio_SZL']);

Route::post('/Boiler/Biomass/BMF',[QuestionController::class,'store'])->name('UW-2S');
Route::get('/Boiler/Biomass/BMF',[ViewController::class,'Bio_BMF']);

//燃煤

Route::get('/Boiler/CoalFired', function () {
    return view('product/category/Boiler/CoalFired');
});

Route::post('/Boiler/CoalFired/DZL',[QuestionController::class,'store'])->name('UW-2S');
Route::get('/Boiler/CoalFired/DZL',[ViewController::class,'Coal_DZL']);

Route::post('/Boiler/CoalFired/SZL',[QuestionController::class,'store'])->name('UW-2S');
Route::get('/Boiler/CoalFired/SZL',[ViewController::class,'Coal_SZL']);




// <*--------  其他 -----------*>
Route::get('/others', function () {
    return view('product/category/others');
});

Route::post('/ON-5',[QuestionController::class,'store'])->name('UW-2S');
Route::get('/ON-5',[ViewController::class,'ON5']);

Route::post('/ON-CM',[QuestionController::class,'store'])->name('UW-2S');
Route::get('/ON-CM',[ViewController::class,'ONCM']);

Route::post('/WLS-301',[QuestionController::class,'store'])->name('UW-2S');
Route::get('/WLS-301',[ViewController::class,'WLS301']);

Route::post('/OM-78',[QuestionController::class,'store'])->name('UW-2S');
Route::get('/OM-78',[ViewController::class,'OM78']);

Route::post('/OB-201L',[QuestionController::class,'store'])->name('UW-2S');
Route::get('/OB-201L',[ViewController::class,'OB201L']);

Route::post('/OP-408S',[QuestionController::class,'store'])->name('UW-2S');
Route::get('/OP-408S',[ViewController::class,'OP408S']);

Route::post('/OP-747',[QuestionController::class,'store'])->name('UW-2S');
Route::get('/OP-747',[ViewController::class,'OP747']);

Route::post('/OW-40',[QuestionController::class,'store'])->name('UW-2S');
Route::get('/OW-40',[ViewController::class,'OW40']);

Route::post('/DS-FS',[QuestionController::class,'store'])->name('UW-2S');
Route::get('/DS-FS',[ViewController::class,'DSFS']);

Route::post('/OP-102A',[QuestionController::class,'store'])->name('UW-2S');
Route::get('/OP-102A',[ViewController::class,'OP102A']);


//         -------------常見問題-----------------
Route::group(['prefix'=>'FAQ'],function(){
// Route::post('/FAQ',MessageController::class)->name('post');
 //驗布
   Route::get('/inspection/OC40N02',[FAQController::class,'OC40N02']); 
   Route::get('/inspection/OC1',[FAQController::class,'OC1']);
   Route::get('/inspection/OC-5B',[FAQController::class,'OC5B']);
   Route::get('/inspection/OC-83',[FAQController::class,'OC83']);
 //鬆布
   Route::get('/relaxing/UW-2',[FAQController::class,'UW2']);
   Route::get('/relaxing/UW-2S',[FAQController::class,'UW2S']);
   Route::get('/relaxing/OC-100',[FAQController::class,'OC100']);
   Route::get('/relaxing/OSP-2000II',[FAQController::class,'OSP2000II']);
   Route::get('/relaxing/OSP-2008',[FAQController::class,'OSP2008']);
 //拉布
   Route::get('/spreading/M190G',[FAQController::class,'M190G']);
   Route::get('/spreading/J3',[FAQController::class,'J3']);
   Route::get('/spreading/KPro',[FAQController::class,'KPro']);
   Route::get('/spreading/KProLite',[FAQController::class,'KProLite']);
   Route::get('/spreading/F8',[FAQController::class,'F8']);
   Route::get('/spreading/T5',[FAQController::class,'T5']);



//裁剪
Route::get('/FAQ/cutting/TAC',[FAQController::class,'TAC']);
});
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



//會員登入／註冊

Route::get('/log', function () {
    return view('/layouts/log');
});

Route::get('/register', function () {
    return view('/layouts/register');
});




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

