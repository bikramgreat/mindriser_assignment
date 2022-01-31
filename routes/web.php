<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\KycController;
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



Route::get('login',function (){
    return view('authentication.login');
})->name('authentication.login');

Route::get('register',function (){
    return view('authentication.register');
});

Route::post('user-login',[AuthenticationController::class,'login'])->name('authentication.user-login');
Route::post('user-register',[AuthenticationController::class,'register'])->name('authentication.user-register');
Route::get('logout',[AuthenticationController::class,'logout'])->name('authentication.logout');

Route::middleware(['auth'])->group(function (){
    Route::get('/', function () {
//    return view('dashboard_layout.dashboard');
    });

    Route::get('dashboard',[AuthenticationController::class,'dashboard'])->name('authentication.dashboard');


    Route::get('kyc/create',[KycController::class,'create'])->name('kyc.create');
    Route::post('kyc/store',[KycController::class,'store'])->name('kyc.store');
    Route::get('kyc/profile',[KycController::class,'profile'])->name('kyc.profile');
    Route::get('kyc/edit/{id}',[KycController::class,'edit'])->name('kyc.edit');

});
