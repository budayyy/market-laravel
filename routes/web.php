<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\RetailController;
use App\Http\Controllers\BuilderController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\ShippingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ConsultantController;
use App\Http\Controllers\NotifController;

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

// Halaman Utama
Route::get('/', [LoginController::class, 'index'])->name('index');
Route::post('/proseslogin', [LoginController::class, 'proses']);
Route::post('/logout', [LoginController::class, 'logout']);

// Forgot Password
Route::get('/forgot-password', [LoginController::class, 'forgot']);
Route::post('/confirm-email', [LoginController::class, 'confirmEmail']);
Route::post('/confirm-hp', [LoginController::class, 'confirmHP']);
Route::post('/reset-password', [LoginController::class, 'resetPassword']);
Route::put('/confirm-password', [LoginController::class, 'confirmPassword']);

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('akses');

// Category
Route::resource('/category', CategoryController::class)->middleware('akses');

// Shiping
Route::resource('/shipping', ShippingController::class)->middleware('akses');

// Orders
Route::get('/orders', [OrderController::class, 'index'])->middleware('akses');
Route::get('/orders/detail/{odr_id}', [OrderController::class, 'detail'])->middleware('akses');
Route::get('/orders/invoice/{odr_id}', [OrderController::class, 'invoice'])->middleware('akses');

// Payment
Route::resource('/payment', PaymentController::class)->middleware('akses');

// Members
Route::resource('/members', MemberController::class)->middleware('akses');

// City
Route::resource('/city', CityController::class)->middleware('akses');

// Consultant
Route::resource('/consultant', ConsultantController::class)->middleware('akses');

// Builder
Route::resource('/builder', BuilderController::class)->middleware('akses');

// Users
Route::resource('/users', AdminController::class)->middleware('akses');

// Retail
Route::get('/retail', [RetailController::class, 'index'])->middleware('akses');
Route::get('/retail/aktif', [RetailController::class, 'aktif'])->middleware('akses');
Route::get('/retail/reject', [RetailController::class, 'reject'])->middleware('akses');
Route::get('/retail/review', [RetailController::class, 'review'])->middleware('akses');
Route::get('/retail/hapus/{rtl_id}', [RetailController::class, 'hapus'])->middleware('akses');
Route::get('/retail/validasi/{rtl_id}', [RetailController::class, 'validasi'])->middleware('akses');
Route::get('/retail/detail/{rtl_id}', [RetailController::class, 'detail'])->middleware('akses');

// Laporan
Route::get('/laporan', [LaporanController::class, 'index'])->middleware('akses');
Route::get('/laporan/penjualan', [LaporanController::class, 'penjualan'])->middleware('akses');
Route::get('/laporan/terbanyak', [LaporanController::class, 'terbanyak'])->middleware('akses');
Route::get('/laporan/periode', [LaporanController::class, 'periode'])->middleware('akses');

Route::get('/notification', [NotifController::class, 'index']);

// Profile
Route::resource('/profile', ProfileController::class)->middleware('akses');
Route::put('/ubahPassword/{adm_id}', [ProfileController::class, 'ubahPassword'])->middleware('akses');
Route::put('/profile/ubah-foto/{adm_id}', [ProfileController::class, 'ubahFoto']);

// Chat 
Route::get('/chat', [ChatController::class, 'index']);
