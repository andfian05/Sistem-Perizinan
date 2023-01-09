<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MahasantriController;
use App\Http\Controllers\OutingController;
use App\Http\Controllers\TabelOutingController;
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

Route::get('/var', function(){
    return view('page.var');
});
Route::get('/', [IndexController::class,'index'])->name('login');
Route::post('/checkacc', [IndexController::class, 'authanticate']);
//If Succes->goto Index
Route::get('/welcome', [IndexController::class, 'success'])->middleware('auth');

// Log Auth
Route::post('/logout', [IndexController::class, 'logout'])->middleware('auth');
//lainnya
Route::get('/change-pass', function(){
    return view('page.change',[
        'title' => ['Change Password']
    ]);})->middleware('auth');
Route::patch('/send-change',[UserController::class,'change'])->middleware('auth');

// admin routes
Route::resource('/page-user',UserController::class)->middleware(['admin']);
Route::get('/search-user/{id}', [UserController::class, 'search'])->middleware(['admin']);
Route::resource('/page-mahasantri',MahasantriController::class)->middleware(['admin']);
Route::get('/search-mahasantri/{id}', [MahasantriController::class, 'search'])->middleware(['admin']);
Route::patch('/change-status/{id}',[OutingController::class,'status'])->middleware(['admin']);
Route::resource('/page-outing',OutingController::class)->middleware(['admin']);

// Security Log
Route::get('/page-logging', [TabelOutingController::class,'log_user'])->middleware(['security','admin']);
Route::get('/page-all-log', [TabelOutingController::class,'log_all_user'])->middleware(['security','admin']);
Route::patch('/sub-call/{id}', [TabelOutingController::class,'sub_call'])->middleware(['security','admin']);

// Mahasantri Log
Route::get('/keterangan',[TabelOutingController::class,'index'])->middleware('auth');
Route::post('/text-send',[TabelOutingController::class,'submit'])->middleware('auth');
Route::get('/report-wait',[TabelOutingController::class,'wait'])->middleware('auth');
Route::get('/report-sucs',[TabelOutingController::class,'sukses'])->middleware('auth');
Route::get('/report-fail',[TabelOutingController::class,'gagal'])->middleware('auth');

//LOG SOME REPORTING
Route::patch('/iya/{id}',[TabelOutingController::class,'iya'])->middleware(['admin','security']);
Route::patch('/tidak/{id}',[TabelOutingController::class,'tidak'])->middleware(['admin','security']);

//REQUEST TO IN 
Route::patch('/masuk/{id}',[TabelOutingController::class,'masuk'])->middleware(['auth']);
