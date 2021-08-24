<?php

use App\Http\Controllers\admin\comment\dashCommentController;
use App\Http\Controllers\admin\counter\CounterController;
use App\Http\Controllers\admin\counter\counterhomeController;
use App\Http\Controllers\admin\form\dashFormController;
use App\Http\Controllers\admin\media\dashMediaController;
use App\Http\Controllers\admin\page\dashPageController;
use App\Http\Controllers\admin\post\dashPostCatController;
use App\Http\Controllers\admin\post\dashpostController;
use App\Http\Controllers\admin\post\dashPostTagController;
use App\Http\Controllers\admin\post\productsController;
use App\Http\Controllers\admin\shopManage\dashShopConfigController;
use App\Http\Controllers\admin\shopManage\dashShopCouponController;
use App\Http\Controllers\admin\shopManage\dashShopCustomerController;
use App\Http\Controllers\admin\shopManage\dashShopOrderController;
use App\Http\Controllers\admin\shopManage\dashShopReportController;
use App\Http\Controllers\admin\shopManage\dashShopStatusController;
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

// Route::get('/',function(){
//     echo route('lara-admin');
// });
// Route::permanentRedirect('/dashboard', '/lara-admin/dashboard');
//Route::get('/login',[UserController::class, 'index']);
//Route::post('login', [ 'as' => 'login', 'uses' => 'LoginController@do']);
//Route::group(['prefix' => 'lara-admin',  'middleware' => 'auth'], function()
Route::group(['prefix' => 'lara-admin'],function()
{
    //    acounter
    Route::resource('dashboard',CounterController::class);
    Route::get('dashboard',['as'=>'dashcounter','uses'=>'App\Http\Controllers\admin\counter\CounterController@index']);

    Route::group(['prefix' => 'dashboard'],function() {
        Route::resource('/acounter/home',counterhomeController::class);
        Route::get('/acounter/home',['as'=>'dashcounterhome','uses'=>'App\Http\Controllers\admin\counter\counterhomeController@index']);

        Route::resource('acounter/update',counterhomeController::class);
        Route::get('acounter/update',['as'=>'dashcounterupdate','uses'=>'App\Http\Controllers\admin\counter\counterupdateController@index']);
    });

    //    posts
    Route::resource('/posts',dashpostController::class);
    Route::get('/posts',['as'=>'dashposts','uses'=>'App\Http\Controllers\admin\post\dashpostController@index']);
    Route::resource('/posts/categories',dashPostCatController::class);
    Route::resource('/posts/tags',dashPostTagController::class);

    //    media
    Route::resource('/media',dashMediaController::class);

    //    pages
    Route::resource('/pages',dashPageController::class);

    //    comments
    Route::resource('/comments',dashCommentController::class);

    //    forms
    Route::resource('/forms',dashFormController::class);

    //    shop-manage
    Route::get('/shop-manage',['as'=>'shopManage.index','uses'=>'App\Http\Controllers\admin\shopManage\shopManageController@index']);
    Route::group(['prefix' => 'shop-manage'],function() {
       Route::resource('/shop-orders',dashShopOrderController::class);
       Route::resource('/shop-customers',dashShopCustomerController::class);
       Route::resource('/shop-coupons',dashShopCouponController::class);
       Route::resource('/shop-report',dashShopReportController::class);
       Route::resource('/shop-config',dashShopConfigController::class);
       Route::resource('/shop-status',dashShopStatusController::class);
    });


    //    products
    // Route::resource('/products',productsController::class);
    // Route::group(['prefix' => 'product'],function() {
    //    Route::resource('/product-category',dashProductCatController::class);
    //    Route::resource('/product-tags',dashProductCatController::class);
    //    Route::resource('/product-attr',dashProductAttrController::class);
    // });

    //    shop-statics
//    Route::resource('/shop-statics',shopStaticsController::class);
//    Route::group(['prefix' => 'shop-statics'],function() {
//        Route::resource('/product-statics',dashProductStatController::class);
//        Route::resource('/revenue-statics',dashRevenueController::class);
//        Route::resource('/order-statics',dashOrderStatsController::class);
//        Route::resource('/variation-statics',dashVariationStatsController::class);
//        Route::resource('/category-statics',dashCategoryStatsController::class);
//        Route::resource('/coupons-statics',dashCouponsStatsController::class);
//        Route::resource('/tax-statics',dashTaxStatsController::class);
//        Route::resource('/downloads-stats/',dashDownloadStatsController::class);
//        Route::resource('/stock-stats/',dashStockStatsController::class);
//        Route::resource('/setting-stats/',dashSettingStatsController::class);
//    });

    //    marketing
//    Route::resource('/marketing',marketingController::class);
//    Route::group(['prefix' => 'marketing'],function() {
//        Route::resource('/marketer-coupon',dashMarketerCouponController::class);
//    });

    //    Appearance
//    Route::get('/appearance',['as'=>'appearance.index','uses'=>'App\Http\Controllers\admin\appearance\appearance@index']);
//    Route::group(['prefix' => 'appearance'],function() {
//        Route::get('/thems',['as'=>'appearance.index','uses'=>'App\Http\Controllers\admin\appearance\appearance@index']);
//        Route::get('/customize-appear',['as'=>'customizeappear.index','uses'=>'App\Http\Controllers\admin\appearance\appearance@index']);
//        Route::get('/widget-appear',['as'=>'widgetAppear.index','uses'=>'App\Http\Controllers\admin\appearance\widget@index']);
//        Route::get('/menu-appear',['as'=>'menuAappear.index','uses'=>'App\Http\Controllers\admin\appearance\menu@index']);
//        Route::get('/header-appear',['as'=>'headappearance.index','uses'=>'App\Http\Controllers\admin\appearance\header@index']);
//        Route::get('/background-appear',['as'=>'backgroundappearance.index','uses'=>'App\Http\Controllers\admin\appearance\background@index']);
//        Route::get('/editor-appear',['as'=>'editorappearance.index','uses'=>'App\Http\Controllers\admin\appearance\editor@index']);
//    });

    //    users
//    Route::resource('/users',dashUserController::class);

    //    tools
//    Route::get('/tools',[dashToolsController::class,'index'])->name('tools');
//    Route::group(['prefix' => 'tools'],function() {
//        Route::get('/import',[dashImportController::class,'index'])->name('import');
//        Route::get('/export',[dashExportController::class,'index'])->name('export');
//        Route::get('/site-health',[dashSiteHealthController::class,'index'])->name('siteHealth');
//        Route::get('/export-personal-data',[dashExportPersondataController::class,'index'])->name('ExportPersondata');
//        Route::get('/clear',[dashClearController::class,'index'])->name('clear');
//        Route::get('/cron-job',[dashCronJobController::class,'index'])->name('cron');
//    });

    //  settings
//    Route::get('/settings',[dashToolsController::class,'index'])->name('settings');
//    Route::group(['prefix' => 'settings'],function() {
//        Route::get('/writing',[dashImportController::class,'index'])->name('writing');
//        Route::get('/reading',[dashExportController::class,'index'])->name('reading');
//        Route::get('/discussion',[dashDiscussionController::class,'index'])->name('discussion');
//        Route::get('/media',[dashMediaSettingController::class,'index'])->name('mediasetting');
//        Route::get('/permalinks',[dashPermalinksController::class,'index'])->name('permalinks');
//        Route::get('/privacy',[dashPrivacyController::class,'index'])->name('privacy');
//    });

    //acf
//    Route::resource('/acf',dashAcfController::class);
//    Route::resource('/acf/tools',dashAcfToolsController::class);


});
