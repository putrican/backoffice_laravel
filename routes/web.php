<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CursController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RegisterController;


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
    
    // $role = Role::find(2);
    // $role->givePermission('approve price', 'delete post');

    return view('welcome');
    // dd($role);
});


Route::get('/home',function(){
    return view('home');
});
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);

Route::get('/logout', [LoginController::class, 'index'])->name('logout');
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth'); 

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);

Route::group(['prefix' => 'dashboard', 'middleware'] , function () {
    Route::get('/', function(){ 
        return view('dashboard.index');
    });
    
    Route::get('/orders/index', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/create', [OrderController::class, 'create'])->name('orders.create');
    Route::post('/orders/store', [OrderController::class, 'store'])->name('orders.store');
    Route::get('/orders/edit/{id}', [OrderController::class, 'edit'])->name('orders.edit');
    Route::patch('/orders/update/{id}', [OrderController::class, 'update'])->name('orders.update');
    Route::get('/orders/upload/{id}', [OrderController::class, 'viewFileUpload'])->name('orders.viewFileUpload');
    Route::patch('/orders/upload/{id}', [OrderController::class, 'fileUpload'])->name('orders.fileUpload');
    Route::get('/orders/approve/{id}', [OrderController::class, 'viewApprove'])->name('orders.viewApprove');
    Route::post('/orders/approve/{id}', [OrderController::class, 'approve'])->name('orders.approve');
    Route::get('/orders/final/{id}', [OrderController::class, 'viewFinalUpload'])->name('orders.viewFinalUpload');
    Route::patch('/orders/final/{id}', [OrderController::class, 'finalUpload'])->name('orders.finalUpload');
    Route::get('/orders/cont/{id}', [OrderController::class, 'viewCont'])->name('orders.viewCont');
    Route::post('/orders/cont/{id}', [OrderController::class, 'cont'])->name('orders.cont');
    Route::post('/orders/search', [OrderController::class, 'search'])->name('orders.search');

    Route::get('/kurs/index',[CursController::class,'index'])->name('kurs.index');
    Route::get('/kurs/create',[CursController::class,'create'])->name('kurs.create');
    Route::post('/kurs/store', [CursController::class, 'store'])->name('kurs.store');
    Route::get('/kurs/edit/{id}', [CursController::class, 'edit'])->name('kurs.edit');
    Route::patch('/kurs/update/{id}', [CursController::class, 'update'])->name('kurs.update');

    Route::get('/orders/getmatauang', [OrderController::class, 'getmatauang'])->name('orders.getmatauang');

 });

 














 
 





