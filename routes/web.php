<?php

use App\Http\Controllers\SkincareController;
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\TokoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RincianController;
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


Route::get('/', [SkincareController::class, 'index']);
Route::get('/skincare', [SkincareController::class, 'index'])->name('skincare.index');
Route::get('/skincare/add', [SkincareController::class, 'create'])->name('skincare.create');
Route::post('/skincare/store', [SkincareController::class, 'store'])->name('skincare.store');
Route::get('/skincare/edit/{id}', [SkincareController::class, 'edit'])->name('skincare.edit');
Route::get('/skincare/show/{id}', [SkincareController::class, 'show'])->name('skincare.show');
Route::post('/skincare/update/{id}', [SkincareController::class, 'update'])->name('skincare.update');
Route::delete('/skincare/delete/{id}', [SkincareController::class, 'softDelete'])->name('skincare.softDelete');
Route::delete('/skincare/delete/permanen/{id}', [SkincareController::class, 'hardDelete'])->name('skincare.hardDelete');
Route::get('/skincare/restore/{id}', [SkincareController::class, 'restore'])->name('skincare.restore');

Route::get('/perusahaan', [PerusahaanController::class, 'index'])->name('perusahaan.index');
Route::get('/perusahaan/add', [PerusahaanController::class, 'create'])->name('perusahaan.create');
Route::post('/perusahaan/store', [PerusahaanController::class, 'store'])->name('perusahaan.store');
Route::get('/perusahaan/edit/{id}', [PerusahaanController::class, 'edit'])->name('perusahaan.edit');
Route::post('/perusahaan/update/{id}', [PerusahaanController::class, 'update'])->name('perusahaan.update');
Route::delete('/perusahaan/delete/{id}', [PerusahaanController::class, 'delete'])->name('perusahaan.delete');

Route::get('/toko', [TokoController::class, 'index'])->name('toko.index');
Route::get('/toko/add', [TokoController::class, 'create'])->name('toko.create');
Route::post('/toko/store', [TokoController::class, 'store'])->name('toko.store');
Route::get('/toko/edit/{id}', [TokoController::class, 'edit'])->name('toko.edit');
Route::post('/toko/update/{id}', [TokoController::class, 'update'])->name('toko.update');
Route::delete('/toko/delete/{id}', [TokoController::class, 'delete'])->name('toko.delete');


Route::get('/skincare/show/{id}', [SkincareController::class, 'show'])->name('skincare.show');
Route::get('/soft', [SkincareController::class, 'softIndex'])->name('softDelete');
Route::get('/restore', [SkincareController::class, 'softIndex'])->name('restore');

Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');
Route::get('home', [SkincareController::class, 'index'])->name('home')->middleware('auth');
Route::get('/logout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');
