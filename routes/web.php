<?php

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

Route::get('thu',function (){
    echo 'afad fdv';
});

Route::get('trang-chu',[\App\Http\Controllers\PageController::class, 'getIndex']);
Route::get('loai-san-pham/{type}',[\App\Http\Controllers\PageController::class, 'getLoaiSanPham']);
Route::get('chi-tiet-san-pham/{id}',[\App\Http\Controllers\PageController::class, 'getChiTietSanPham']);
Route::get('lien-he',[\App\Http\Controllers\PageController::class, 'getLienHe']);
Route::get('gioi-thieu',[\App\Http\Controllers\PageController::class, 'getGioiThieu']);

Route::get('add-to-cart/{id}',[\App\Http\Controllers\PageController::class, 'getAddtoCart']);
Route::get('delete-cart/{id}',[\App\Http\Controllers\PageController::class, 'getDeleteCart']);

Route::get('dat-hang',[\App\Http\Controllers\PageController::class, 'getCheckout']);
Route::post('dat-hang',[\App\Http\Controllers\PageController::class, 'postCheckout']);


Route::get('dang-nhap',[\App\Http\Controllers\PageController::class, 'getLogin']);
Route::post('dang-nhap',[\App\Http\Controllers\PageController::class, 'postLogin']);

Route::get('dang-xuat',[\App\Http\Controllers\PageController::class,'getLogout']);

Route::get('dang-ky',[\App\Http\Controllers\PageController::class, 'getDangKy']);
Route::post('dang-ky',[\App\Http\Controllers\PageController::class, 'postDangKy']);

Route::get('search',[\App\Http\Controllers\PageController::class, 'getSearch']);


Route::get('search',[\App\Http\Controllers\PageController::class, 'getSearch']);

Route::get('resign-email', [\App\Mail\SendMail::class, 'send_mail'])->name('send_mail');
