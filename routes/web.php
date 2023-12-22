<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Models\Category;
use GuzzleHttp\Middleware;

    Route::get('/', function () {
    return view('login');
    });

    // login, register

    Route::redirect('/', 'login');
    Route::get('loginPage',[AuthController::class,'loginPage'])->name('auth#loginPage');
    Route::get('registerPage',[AuthController::class,'registerPage'])->name('auth#registerPage');

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function () {
    // dashboard
    Route::get('dashboard',[AuthController::class,'dashboard'])->name('dashboard');
    
    // admin
    // Middleware
    // Route::group(['middleware'=>'admin_auth'],function(){
         
    // }); 
    Route::middleware(['admin_auth'])->group(function(){
        // category
        Route::group(['prefix'=>'category','middleware'=>'admin_auth'],function(){

            Route::get('list',[CategoryController::class,'list'])->name('category#list'); 
            Route::get('create/page',[CategoryController::class,'createPage'])->name('category#createPage');
            Route::post('create',[CategoryController::class,'create'])->name('category#create');
            Route::get('delete/{id}',[CategoryController::class,'delete'])->name('category#delete');
            Route::get('edit/{id}',[CategoryController::class,'edit'])->name('category#edit');
            Route::post('update',[CategoryController::class,'update'])->name('category#update');
    }); 
    });

    Route::prefix('admin')->group(function(){
        Route::get('passsword/change',[AuthController::class,'changePasswordPage'])->name('admin#changePasswordPage');
    });
    

    // user
    // home
    Route::group(['prefix'=>'user','middleware'=>'user_auth'],function()
    {
        Route::get('home', function(){

            return view('user.home');
        })->name('user#home');
    });
});

// testing  sd fsadfsdfasafwerwaadjvalkjwaeo8fiuwapjfihiuoipojhidsopifojhasiuoeufpojhiuwoea9upfo
// testing jsoafjdkjfjkdsflksdflksdff