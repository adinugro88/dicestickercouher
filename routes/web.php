<?php

use App\Http\Controllers\AkunController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CabangController;
use App\Http\Controllers\TokoController;
use App\Http\Controllers\VoucherController;
use App\Http\Controllers\CustomerController;
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
    return redirect('/login');
});

Auth::routes();

Route::group(['prefix' => 'dashboard/admin'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::get('/cabang',[CabangController::class, 'index'])->name('cabang');
    Route::get('/toko',[TokoController::class, 'index'])->name('toko');
    Route::get('/voucher',[VoucherController::class, 'index'])->name('voucher');
    Route::get('/report',[CustomerController::class, 'index'])->name('report');
    Route::get('/report/date/',[CustomerController::class, 'show'])->name('reportbydate');
    Route::get('/customer',[CustomerController::class, 'customer'])->name('customer');
    Route::get('/customercrud',[CustomerController::class, 'customercrud'])->name('customercrud');
  

    Route::group(['prefix' => 'profile'], function () {
        Route::get('/', [HomeController::class, 'profile'])->name('profile');
        Route::post('update', [HomeController::class, 'updateprofile'])->name('profile.update');
    });

    Route::controller(AkunController::class)
        ->prefix('akun')
        ->as('akun.')
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('showdata', 'dataTable')->name('dataTable');
            Route::match(['get','post'],'tambah', 'tambahAkun')->name('add');
            Route::match(['get','post'],'{id}/ubah', 'ubahAkun')->name('edit');
            Route::delete('{id}/hapus', 'hapusAkun')->name('delete');
        });
});
