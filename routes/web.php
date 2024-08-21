<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SmsController;

//admin-side
use App\Http\Controllers\admin\CityController;
use App\Http\Controllers\admin\StateController;
use App\Http\Controllers\admin\AreaController;
use App\Http\Controllers\admin\SolarController;
use App\Http\Controllers\admin\IndexController;
use App\Http\Controllers\admin\AdminOrderController;
use App\Http\Controllers\admin\BannerController;
use App\Http\Controllers\admin\AboutController;
use App\Http\Controllers\admin\ServiceController;
use App\Http\Controllers\admin\ProjectController;
use App\Http\Controllers\admin\ReviewController;
use App\Http\Controllers\admin\ContactController;
use App\Http\Controllers\admin\AdminInqueryController;
use App\Http\Controllers\admin\SettingController;
use App\Http\Controllers\admin\FinanceController;
use App\Http\Controllers\admin\AskQuestionController;
use App\Http\Controllers\admin\ChooseController;//
use App\Http\Controllers\admin\PrivacyController;
//sub-admin-side
use App\Http\Controllers\subadmin\OrderController;
use App\Http\Controllers\subadmin\VisitOrderController;
use App\Http\Controllers\subadmin\QuotationController;
use App\Http\Controllers\subadmin\CompleteController;
use App\Http\Controllers\subadmin\CancelController;
use App\Http\Controllers\subadmin\SubIndexController;
use App\Http\Controllers\subadmin\SubinqueryController;
//customer
use App\Http\Controllers\customer\RegisterController;
use App\Http\Controllers\customer\CusIndexController;
use App\Http\Controllers\customer\DashboardController;
//
use App\Http\Controllers\GoogleLoginController;
use App\Http\Controllers\FacebookController;
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

//register
Route::get('register',[RegisterController::class,'index'])->name('register');//register
Route::post('getregister',[RegisterController::class,'getregister'])->name('getregister');//register
Route::post('otp-send', [RegisterController::class, 'otpsend'])->name('otpsend');
// Route::get('register',[RegisterController::class,'index'])->name('user.register');

//login
Route::get('/admin/login',[LoginController::class, 'index'])->name('login');
Route::post('userlogin',[LoginController::class, 'userlogin'])->name('userlogin');
Route::get('login',[LoginController::class, 'userloginpage'])->name('userloginpage');//
Route::get('forget', [LoginController::class, 'forgetpage'])->name('forgetpage');
Route::post('forget',[LoginController::class, 'getforgetuserpassword'])->name('getforget');

Route::middleware(['auth', 'check_user_type:2'])->group(function () {
    Route::group(['prefix'=>'subadmin','as'=>'subadmin.'], function () {

        Route::get('dashboard',[SubIndexController::class, 'index'])->name('dashboard');
        Route::get('/logout', [SubIndexController::class, 'logout'])->name('logout');
        //order
        Route::resource('order', OrderController::class);
        Route::get('orderdata', [OrderController::class, 'orderdata'])->name('order.orderdata');
        Route::post('order/toggle-status', [OrderController::class, 'toggleStatus'])->name('order.toggleStatus');
        //visitorder
        Route::resource('visitorder', VisitOrderController::class);
        //quotationorder
        Route::resource('quotationorder', QuotationController::class);
        //complete
        Route::resource('complete', CompleteController::class);
        //cancel
        Route::resource('cancel', CancelController::class);
        //inquery
        Route::resource('inquery', SubinqueryController::class);
    });
});

Route::middleware(['auth', 'check_user_type:1'])->group(function () {
    Route::group(['prefix'=>'admin','as'=>'admin.'], function () {

        Route::get('dashboard',[IndexController::class,'index'])->name('dashboard');
        //state
        Route::resource('state', StateController::class);
        //city
        Route::resource('city', CityController::class);
        //area
        Route::resource('area', AreaController::class);
        //solar
        Route::resource('solar', SolarController::class);
        Route::delete('/solar/imgdlt/{id}',[SolarController::class,'imgdlt'])->name('solar.imgdlt');
        //pm
        Route::resource('pm', UserController::class);
        Route::post('users/toggle-status', [UserController::class, 'toggleStatus'])->name('users.toggleStatus');
        Route::get('getdata', [UserController::class, 'getdata'])->name('pm.getdata');
        Route::get('user/index', [UserController::class, 'userindex'])->name('pm.userindex');
        Route::get('userdata', [UserController::class, 'userdata'])->name('pm.userdata');
        //userdetail
        Route::get('userdetail/{id}', [UserController::class, 'userdetail'])->name('pm.userdetail');
        //logout
        Route::get('/logout', [IndexController::class, 'logout'])->name('logout');
        //order
        Route::resource('quotationvisit', AdminOrderController::class);
        Route::post('quotationvisit/toggle-status', [AdminOrderController::class, 'toggleStatus'])->name('quotationvisit.toggleStatus');
        //banner
        Route::resource('banner', BannerController::class);
        Route::post('banner/toggle-status', [BannerController::class, 'toggleStatus'])->name('banner.toggleStatus');
        //about
        Route::resource('about', AboutController::class);
        //service
        Route::resource('service', ServiceController::class);
        //project
        Route::resource('project', ProjectController::class);
        //review
        Route::resource('review', ReviewController::class);
        //Contact
        Route::resource('contact', ContactController::class);
        //inqueryAdmin
        Route::resource('inqueryAdmin', AdminInqueryController::class);

        // Route::get('/settings', function () {
        //     return view('admin.settings.index');
        // })->name('settings');
        Route::resource('settings', SettingController::class);
        //finance
        Route::resource('finance', FinanceController::class);
        //askquestion
        Route::resource('askquestion', AskQuestionController::class);
        //choose
        Route::resource('choose', ChooseController::class);
        //privacy
        Route::resource('privacy', PrivacyController::class);
        //terms
        Route::resource('terms', PrivacyController::class);
        //cityamount id
        Route::get('/city/{id}/amount', [IndexController::class, 'cityAmount'])->name('get.cityamount');
    });
});
Route::get('downloadsurveyphoto/{id}', [AdminOrderController::class, 'downloadSurveyPhoto'])->name('loadsurveyphoto');
Route::get('downloadsurveypdf/{id}', [AdminOrderController::class, 'downloadSurveypdf'])->name('loadsurveypdf');
Route::get('/downloadproposal/{id}', [AdminOrderController::class, 'downloadproposal'])->name('downloadproposal');
Route::get('otp', [RegisterController::class, 'showOtpForm'])->name('otp.form');
Route::post('otp', [RegisterController::class, 'verifyOtp'])->name('otp.verify');

Route::get('forgetpwdotp', [LoginController::class, 'forgetpwdotp'])->name('otp.forgetuserpassword');

Route::post('otpforgetlogin', [LoginController::class, 'otpforgetlogin'])->name('otp.loginforget');

Route::middleware(['auth', 'check_user_type:0'])->group(function () {
    Route::get('home', function () {
        return view('home');
    })->name('home');
    
    // Route::get('/calculator', [CusIndexController::class, 'index'])->name('calculator');
    // Route::post('/calculate', [CusIndexController::class, 'calculate'])->name('calculate');
});
//google login
Route::get('login/google', [GoogleLoginController::class, 'redirectToGoogle'])->name('login.google');
Route::get('google/callback', [GoogleLoginController::class, 'handleGoogleCallback']);
//end google login
//facebook login
Route::controller(FacebookController::class)->group(function(){
    Route::get('login/facebook', 'redirectToFacebook')->name('login.facebook');
    Route::get('login/facebook/callback', 'handleFacebookCallback');
});
//end facebook login

Route::get('/clear', function () {
  \Artisan::call('cache:clear');
  \Artisan::call('config:clear');
  \Artisan::call('config:cache');
  die('done');
  // return what you want
});

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [CusIndexController::class, 'index'])->name('/');
Route::get('/services', [CusIndexController::class, 'services'])->name('services');
Route::post('userenquiries', [CusIndexController::class, 'userenquiries'])->name('userenquiries');
Route::get('faqs', [CusIndexController::class, 'faqs'])->name('faqs');
Route::post('/calculate', [CusIndexController::class, 'calculate'])->name('calculate.solar');
// Route::get('/calculator', [CusIndexController::class, 'index'])->name('calculator');
Route::post('contact', [ContactController::class, 'store'])->name('contact');
Route::get('/ormpage',[DashboardController::class,'ormpage'])->name('ormpage');//privacypolicy
Route::get('/privacypolicy',[DashboardController::class,'privacypolicy'])->name('privacypolicy');//
Route::get('/tnc',[DashboardController::class,'tnc'])->name('tnc');

Route::get('refresh_captcha', 'CusIndexController@refreshCaptcha')->name('refresh_captcha');



Route::middleware(['auth', 'check_user_type:0'])->group(function () {
    // Route::get('/profile', [CusIndexController::class, 'profile'])->name('profile');
    Route::get('myorders', [CusIndexController::class, 'myorders'])->name('myorders');
    Route::get('plan/{id}', [CusIndexController::class, 'plan'])->name('plan');

    Route::get('profile', [CusIndexController::class, 'profile'])->name('profile');
    Route::get('editprofile', [CusIndexController::class, 'editprofile'])->name('editprofile');
    Route::post('updateprofile/{id}', [RegisterController::class, 'updateprofile'])->name('updateprofile');
    Route::get('order/{id}', [CusIndexController::class, 'order'])->name('order.inqury');
    Route::get('myaddresses', [CusIndexController::class, 'myaddresses'])->name('myaddresses');
    Route::get('editaddress', [CusIndexController::class, 'editaddress'])->name('editaddress');
    Route::post('addresses', [CusIndexController::class, 'addresses'])->name('addresses');
    Route::get('deleteadd', [CusIndexController::class, 'deleteadd'])->name('deleteadd');
    Route::get('mysocialaccounts', [CusIndexController::class, 'mysocialaccounts'])->name('mysocialaccounts');
    Route::post('updatesocial', [CusIndexController::class, 'socialaccounts'])->name('social.account');
    Route::get('myenquiries', [CusIndexController::class, 'myenquiries'])->name('myenquiries');
    Route::get('/logout', [CusIndexController::class, 'logout'])->name('logout');



    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');//
    Route::get('/getorder/{id}', [DashboardController::class, 'getorder'])->name('getorder');
    Route::get('/getorderdesign/{id}', [DashboardController::class, 'getorderdesign'])->name('getorderdesign');
    Route::post('/setprojectname/{id}', [DashboardController::class, 'setprojectname'])->name('setprojectname');//setprojectname
    Route::get('/mail', [DashboardController::class, 'mail'])->name('mail');
    Route::get('/governmentapproval/{id}', [DashboardController::class, 'governmentapproval'])->name('governmentapproval');
    Route::post('/newcreateproject',[DashboardController::class, 'newcreateproject'])->name('newcreateproject');//
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/payment/{id}', [DashboardController::class, 'payment'])->name('payment');
Route::get('/finance/{id}', [DashboardController::class, 'finance'])->name('finance');//financetab
Route::get('/financetab/{id}', [DashboardController::class, 'financetab'])->name('financetab');
Route::get('/orm/{id}', [DashboardController::class, 'orm'])->name('orm');
Route::get('/userprofile/{id}', [CusIndexController::class, 'profile'])->name('userprofile');
// Route::get('/survey-design', [DashboardController::class, 'surveydesign'])->name('survey-design');//
Route::get('/survey-design/{id}', [DashboardController::class, 'surveydesign'])->name('survey-design');

Route::get('/proposal/{id}', [DashboardController::class, 'proposal'])->name('proposal');//
Route::post('/proposalremark/{id}', [DashboardController::class, 'proposalremark'])->name('proposalremark');
Route::post('/timeline/{id}', [DashboardController::class, 'timeline'])->name('timeline');//
Route::get('/procurement/{id}', [DashboardController::class, 'procurement'])->name('procurement');
// Route::get('/dashboard', function () {
//     return view('user.dashboard.index');
// });
});

//-------------------------
Route::post('/send-sms', [SmsController::class, 'sendSms']);
