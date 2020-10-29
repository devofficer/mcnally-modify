<?php

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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/admin', function () {
    return redirect('/admin/index');
});

Route::get('/index', function () {
    return redirect('/');
});

Route::get('testapi','TestApiController@index');

Route::get('core-fundamental-india','PublicController@coreFundamentalIndia');
Route::get('terminal','PublicController@terminal');


Route::get('/','LandingPageController@index');
Route::get('about','LandingPageController@index');
Route::get('faq','LandingPageController@index');
Route::get('growth','LandingPageController@index');
Route::get('investment','LandingPageController@index');
Route::get('products','LandingPageController@index');
Route::get('terms','LandingPageController@index');
Route::get('usmarketdata','LandingPageController@index');
Route::get('globalstocks','LandingPageController@index');
Route::get('quants','LandingPageController@index');
Route::post('upload-temp-image', 'PublicController@uploadTempImage');
Route::post('upload-temp-file', 'PublicController@uploadTempFile');
Route::post('delete-temp-file', 'PublicController@deleteTempFile');

Route::get('register_step1', function () { return redirect('/'); });
Route::post('register_step1','RegisterController@step1')->name('register_step1');
Route::post('register_step2','RegisterController@step2')->name('register_step2');
Route::post('token','TokenController@token')->name('token');

Auth::routes();

Route::get('register', 'RegisterController@signup')->name('register');

//profile
Route::get('admin/profile-settings', 'ProfileController@index')->name('profile.index');
Route::post('admin/profile-settings/user/{id}', 'ProfileController@useredit');
Route::post('admin/profile-settings/profile/{id}', 'ProfileController@profiledit');
Route::post('admin/profile-settings/profile/avatar/{id}', 'ProfileController@avataredit');

//cards
Route::get('admin/cards', 'CardController@index')->name('card.index');
Route::get('admin/cards/create', 'CardController@create')->name('card.create');
Route::post('admin/cards/create', 'CardController@store');
Route::get('admin/cards/{id}', 'CardController@show');
Route::get('admin/cards/edit/{id}', 'CardController@edit');
Route::post('admin/cards/edit/{id}', 'CardController@update');
Route::post('admin/cards/delete', 'CardController@destroy');
Route::get('admin/listcards', 'CardController@list')->name('card.list');
Route::post('admin/cards/default', 'CardController@default')->name('card.default');

Route::post('admin/createpaymentmethods', 'CardController@createPaymentMethods')->name('createPaymentMethods');

//plans
Route::get('admin/pricing', 'PlanController@pricing')->name('pricing');
Route::get('admin/plan/list', 'PlanController@list')->name('plan.list');
Route::post('admin/plan/change', 'PlanController@change')->name('plan.change');

//invoices
Route::get('admin/invoices/list', 'InvoiceController@list')->name('invoice.list');

//notifications
Route::get('admin/notifications', 'NotificationController@list');
Route::post('admin/add-notification', 'NotificationController@add');
Route::get('admin/del-notification/{id}', 'NotificationController@destroy');
Route::get('admin/checkview', 'NotificationController@checkView');

//news
Route::get('admin/inv-news', 'NewsController@invNews')->name('news.inv-news');
Route::get('admin/news', 'NewsController@index')->name('news.index');
Route::get('admin/news/create', 'NewsController@create')->name('news.create');
Route::post('admin/news/create', 'NewsController@store');

Route::post('admin/news/imgdesc', 'NewsController@imgdesc');
Route::post('admin/news/imgprin', 'NewsController@imgprin');
Route::post('admin/news/delete', 'NewsController@destroy');
Route::get('admin/news/notifications', 'NewsController@notifications');
Route::post('admin/news/filter', 'NewsController@getListFilter');

Route::get('admin/news/{id}', 'NewsController@show');
Route::get('admin/news/edit/{id}', 'NewsController@edit');
Route::post('admin/news/edit/{id}', 'NewsController@update');

//pdf
Route::get('admin/com-research', 'FileManagerController@index')->name('com-research');

Route::get('admin/pdfs', 'FileManagerController@list')->name('list');
Route::post('admin/pdf/attach', 'FileManagerController@attach')->name('attach');
Route::post('admin/pdf/create', 'FileManagerController@create')->name('create');
Route::post('admin/pdf/delete', 'FileManagerController@destroy');
Route::post('admin/pdf/filter', 'FileManagerController@getListFilter');
Route::get('admin/pdf/notifications', 'FileManagerController@notifications');

Route::post('admin/pdf/edit/{id}', 'FileManagerController@update')->name('edit');


//api
Route::get('admin/top-market-news', 'HomeController@topMarketNews')->name('top-market-news');
Route::get('admin/com-profile', 'HomeController@comProfile')->name('com-profile');
Route::get('admin/rec-trends', 'HomeController@recTrends')->name('rec-trends');
Route::get('admin/price-tar', 'HomeController@priceTar')->name('price-tar');
Route::get('admin/eps-surprice', 'HomeController@epsSurprice')->name('eps-surprice');
Route::get('admin/bas-financials', 'HomeController@basFinancials')->name('bas-financials');
Route::get('admin/com-news', 'HomeController@comNews')->name('com-news');


Route::prefix('admin')->group(function(){

    Route::get('pages-recoverpw', 'SkoteController@index');
    Route::get('pages-recoverpw-2', 'SkoteController@index');
    Route::get('pages-lock-screen', 'SkoteController@index');
    Route::get('pages-lock-screen-2', 'SkoteController@index');
    Route::get('pages-404', 'SkoteController@index');
    Route::get('pages-500', 'SkoteController@index');
    Route::get('pages-maintenance', 'SkoteController@index');
    Route::get('pages-comingsoon', 'SkoteController@index');

    Route::get('pdf-upload', 'FileManagerController@create')->name('pdf-upload');
    Route::get('pdf-upload/{id}', 'FileManagerController@edit');
    Route::post('file-manager/get-files', 'FileManagerController@list');
    Route::post('file-manager/store-pdf', 'FileManagerController@store');
    Route::post('file-manager/update-pdf', 'FileManagerController@update');
    Route::post('file-manager/delete-pdf', 'FileManagerController@destroy');

    Route::post('keep-live', 'SkoteController@live');
    

    Route::get('{any}', 'HomeController@index');
});


