<?php

use App\Http\Controllers\admin\adminController;
use App\Http\Controllers\admin\categoryController;
use App\Http\Controllers\admin\colorController;
use App\Http\Controllers\admin\productController;
use App\Http\Controllers\admin\sizeController;
use App\Http\Controllers\admin\subcategoryController;
use GuzzleHttp\Middleware;
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

Route::get('/', function () {
    return view('welcome');
});


Route::prefix('admin')->group(function () {
    

    Route::middleware(['admin'])->group(function () {
     // 
        Route::get('dashboard',[adminController::class,"index"])->name('dashboard');
        Route::get('setting',[adminController::class,'profile'])->name('setting');
        Route::post('setting_update{id}',[adminController::class,'update']);

     // category route   
        Route::get('category',[categoryController::class,'index'])->name('category');
        Route::get('category_add',[categoryController::class,'create'])->name('category_add');
        Route::post('category_store',[categoryController::class,'store']); 
        Route::get('category_edit{id}',[categoryController::class,'edit']);
        Route::post('category_update{id}',[categoryController::class,'update']);
        Route::get('category_destory{id}',[categoryController::class,'destroy']);

    // sub category route 
        Route::get('subcategory',[subcategoryController::class,'index'])->name('subcategory');
        Route::get('subcategory_edit{id}',[subcategoryController::class,'edit']);
        Route::post('subcategory_update{id}',[subcategoryController::class,'update']);
        Route::get('subcategory_destory{id}',[subcategoryController::class,'destroy']);
     // color route 

        Route::get('color',[colorController::class,'index'])->name('color'); 
        Route::post('color_store',[colorController::class,'store']); 
        Route::get('color_edit{id}',[colorController::class,'edit']);
        Route::post('color_update{id}',[colorController::class,'update']);
        Route::get('color_destroy{id}',[colorController::class,'destroy']);

    // sub category route 
        Route::get('size',[sizeController::class,'index'])->name('size');
        Route::get('size_edit{id}',[sizeController::class,'edit']);
        Route::post('size_update{id}',[sizeController::class,'update']);
        Route::get('size_destroy{id}',[sizeController::class,'destroy']);
    // product route 
        Route::get('product',[productController::class,'index'])->name('product');
        Route::get('product_create',[productController::class,'create'])->name('product_create');
        Route::get('subcategoryGet{id}',[productController::class,'subcategoryGet']); 
        Route::post('product_store',[productController::class,'store']); 
        Route::get('change_statu{id}',[productController::class,'changeStatu']);
        Route::post('category_update{id}',[productController::class,'update']);
        Route::get('category_destory{id}',[productController::class,'destroy']);




    });

    

});

    
   

     

 


 
 
    
 
 
 
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
