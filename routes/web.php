<?php

use App\Http\Controllers\admin\aboutController;
use App\Http\Controllers\admin\adminController;
use App\Http\Controllers\admin\attributeController;
use App\Http\Controllers\admin\categoryController;
use App\Http\Controllers\admin\chargeController;
use App\Http\Controllers\admin\colorController;
use App\Http\Controllers\admin\couponController;
use App\Http\Controllers\admin\productController;
use App\Http\Controllers\admin\serveController;
use App\Http\Controllers\admin\settingController;
use App\Http\Controllers\admin\shippingChargeController;
use App\Http\Controllers\admin\sizeController;
use App\Http\Controllers\admin\subcategoryController;
use App\Http\Controllers\admin\userController;
use App\Http\Controllers\cartWebsiteController;
use App\Http\Controllers\frontend\orderController;
use App\Http\Controllers\frontend\userLoginController;
use App\Http\Controllers\frontend\websiteCategoryController;
use App\Http\Controllers\frontend\websiteController;
use App\Http\Controllers\frontend\websiteProductController;
use App\Http\Controllers\frontend\websiteSubcategoryController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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



Route::prefix('admin')->group(function (){
       //
        Route::get('dashboard',[adminController::class,"index"])->name('dashboard');
        Route::get('admin',[adminController::class,"admin"])->name('admin');

        Route::get('setting',[settingController::class,'index'])->name('setting');
        Route::post('setting_update',[settingController::class,'update']);

        // user route
        Route::get('user',[userController::class,"index"])->name('user');
        Route::get('user_edit{id}',[userController::class,"edit"]);
        Route::post('user_update{id}',[userController::class,"update"]);
        // user role route
        Route::get('userRole',[userController::class,"roleIndex"]);
        Route::post('role_store',[userController::class,"roleStore"]);

        Route::get('role_wise_user',[userController::class,"roleWiseUserIndex"])->name('role_wise_user');
        Route::post('userWiseRole_store',[userController::class,"roleWiseUserStore"]);

        Route::get('permission',[userController::class,"permissionIndex"])->name('permission');
        Route::post('permission_store',[userController::class,"permissionStore"]);

        Route::get('role_wise_permission',[userController::class,"roleWisePermissionIndex"])->name('role_wise_permission');
        Route::post('userWisePermission_store',[userController::class,"roleWisePermissionStore"]);

        Route::get('delete_all',[userController::class,"deleteAll"]);


     // category route
        Route::get('category',[categoryController::class,'index'])->name('category');
        Route::get('category_add',[categoryController::class,'create'])->name('category_add');
        Route::post('category_store',[categoryController::class,'store']);
        Route::get('category_edit{id}',[categoryController::class,'edit']);
        Route::post('category_update{id}',[categoryController::class,'update']);
        Route::get('category_destory{id}',[categoryController::class,'destroy']);
        Route::get('category_statu{id}',[categoryController::class,'changeStatu']);

      // sub category route
        Route::get('subcategory',[subcategoryController::class,'index'])->name('subcategory');
        Route::get('subcategory_edit{id}',[subcategoryController::class,'edit']);
        Route::post('subcategory_update{id}',[subcategoryController::class,'update']);
        Route::get('subcategory_destory{id}',[subcategoryController::class,'destroy']);
        Route::get('subcategory_statu{id}',[subcategoryController::class,'changeStatu']);

     // color route
        Route::get('color',[colorController::class,'index'])->name('color');
        Route::post('color_store',[colorController::class,'store']);
        Route::get('color_edit{id}',[colorController::class,'edit']);
        Route::post('color_update{id}',[colorController::class,'update']);
        Route::get('color_destroy{id}',[colorController::class,'destroy']);
        Route::get('color_statu{id}',[colorController::class,'changeStatu']);

      // size route
        Route::get('size',[sizeController::class,'index'])->name('size');
        Route::post('size_store',[sizeController::class,'store']);
        Route::get('size_edit{id}',[sizeController::class,'edit']);
        Route::post('size_update{id}',[sizeController::class,'update']);
        Route::get('size_destroy{id}',[sizeController::class,'destroy']);
        Route::get('size_statu{id}',[sizeController::class,'changeStatu']);



       // product route
        Route::get('product',[productController::class,'index'])->name('product');
        Route::get('product_create',[productController::class,'create'])->name('product_create');
        Route::get('subcategoryGet{id}',[productController::class,'subcategoryGet']);
        Route::post('product_store',[productController::class,'store']);
        Route::get('product_statu{id}',[productController::class,'changeStatu']);
        Route::get('product_fauture{id}',[productController::class,'fauture']);
        Route::get('proudct_edit{id}',[productController::class,'edit']);
        Route::post('product_update{id}',[productController::class,'update']);
        Route::get('proudct_destory{id}',[productController::class,'destroy']);

        // product attibute route
        Route::get('product_attri_create{id}',[attributeController::class,'create']);
        Route::post('product_attri_store{id}',[attributeController::class,'store']);
        Route::get('attribute_edit{product_id}',[attributeController::class,'edit']);
        Route::get('attribute_destroy{id}',[attributeController::class,'destroy']);
        Route::post('oneAttribute_update',[attributeController::class,'oneUpdate']);
        Route::post('attribute_update{product_id}',[attributeController::class,'update']);

        // coupon route
        Route::get('coupon',[couponController::class,'index'])->name('coupon');
        Route::post('coupon_store',[couponController::class,'store']);
        Route::get('coupon_edit{id}',[couponController::class,'edit']);
        Route::post('coupon_update{id}',[couponController::class,'update']);
        Route::get('coupon_destroy{id}',[couponController::class,'destroy']);
        Route::get('coupon_statu{id}',[couponController::class,'changeStatu']);
        Route::post('coupon_aplied',[couponController::class,'couponAplied']);
        Route::get('coupon_remove',[couponController::class,'couponRemove']);

        Route::get('order',[orderController::class,'adminOrders'])->name('order');
        Route::post('order_statu_update',[orderController::class,'orderStatuUpdata']);
        Route::get('order_details{id}',[orderController::class,'orderDetails']);
        Route::get('create_invoice{id}',[orderController::class,'createInvoice']);
        Route::get('invoice_download{id}',[orderController::class,'invoiceDwonload']);

        Route::get('shippingCharge',[shippingChargeController::class,'index'])->name('shippingCharge');
        Route::get('charge',[shippingChargeController::class,'getShippingCharge']);
        Route::get('countryCharge',[shippingChargeController::class,'countryCharge']);




        // about controller route

        Route::get('about',[aboutController::class,'index'])->name('about');
        Route::post('update_about',[aboutController::class,'updateAbout']);
        Route::get('about_pageIndex',[aboutController::class,'aboutIndex']);
        Route::post('store_serve',[serveController::class,'store']);

    });







   // frontend route



Auth::routes();

Route::get('/home',[HomeController::class, 'index'])->name('home');
Route::get('/countryCharge',[HomeController::class, 'create_page'])->name('countryCharge');
Route::get('/',[websiteController::class,'index'])->name('/');
// product route

// single product page details page

Route::get('product_details{id}',[websiteProductController::class,'productDetails']);

Route::get('get_size',[websiteProductController::class,'getSize']);
Route::get('sizeWise',[websiteProductController::class,'sizeWise']);

// product search
  Route::post('searchProduct',[websiteProductController::class,'search']);

Route::get('categoryProduct{id}',[websiteCategoryController::class,'categoryProduct']);
Route::get('subcategoryProduct{id}',[websiteSubcategoryController::class,'subcategoryProduct']);


// category product

// product add to cart rotue

Route::post('single_productAddCart',[cartWebsiteController::class,'singleProductAddCart']);

Route::post('product_addCart',[cartWebsiteController::class,'addCart']);
Route::get('cart_summery',[cartWebsiteController::class,'index']);
Route::get('decrement_qunaty{id}',[cartWebsiteController::class,'decrement']);
Route::get('increment_qunaty{id}',[cartWebsiteController::class,'increment']);
Route::get('delete_cartitem{id}',[cartWebsiteController::class,'destroy']);

    // user login information
    Route::get('loginPage',[userLoginController::class,'create'])->name('loginPage');
    Route::post('account_create',[userLoginController::class,'store']);
    Route::post('loginUser',[userLoginController::class,'loginto']);
    Route::get('loginOut',[userLoginController::class,'loginOut']);

    Route::get('profile',[userLoginController::class,'profileIndex'])->name('profile');
    Route::get('user_order',[userLoginController::class,'userOrder'])->name('user_order');
    Route::get('order_details{id}',[userLoginController::class,'orderDetails']) ;



    Route::get('order_place',[orderController::class,'index']);
    Route::post('order_complet',[orderController::class,'store']);


// currency change
Route::get('currency',[orderController::class,'currencyChange']);
Route::get('change_currencyBd',[orderController::class,'changeCurrencyBd']);
Route::get('usa_currency',[orderController::class,'usaCurrencyChange']);
Route::post('order_store',[orderController::class,'orderStore']);


// aobut page route

