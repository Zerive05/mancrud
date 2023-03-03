<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KedaiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\PelangganController;

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


Route::get('/', [BerandaController::class, 'index'])->name('beranda')->middleware('auth');

Route::get('/dkedai', [KedaiController::class, 'dkedai'])->name('dkedai')->middleware('auth');
Route::get('/tdkedai', [KedaiController::class, 'tambahdata'])->name('tdkedai')->middleware('auth');
Route::get('/edkedai/{id}', [KedaiController::class, 'editdata'])->name('edkedai')->middleware('auth');
Route::post('/idkedai', [KedaiController::class, 'insertdata'])->name('idkedai')->middleware('auth');
Route::post('/udkedai/{id}', [KedaiController::class, 'updatedata'])->name('udkedai')->middleware('auth');
Route::get('/hdkedai/{id}', [KedaiController::class, 'hapusdata'])->name('hdkedai')->middleware('auth');

Route::get('/dpelanggan', [PelangganController::class, 'dpelanggan'])->name('dpelanggan')->middleware('auth');
Route::get('/tdpelanggan', [PelangganController::class, 'tdpelanggan'])->name('tdpelanggan')->middleware('auth');
Route::get('/edpelanggan/{id}', [PelangganController::class, 'edpelanggan'])->name('edpelanggan')->middleware('auth');
Route::post('/idpelanggan', [PelangganController::class, 'idpelanggan'])->name('idpelanggan')->middleware('auth');
Route::post('/udpelanggan/{id}', [PelangganController::class, 'udpelanggan'])->name('udpelanggan')->middleware('auth');
Route::get('/hdpelanggan/{id}', [PelangganController::class, 'hdpelanggan'])->name('hdpelanggan')->middleware('auth');
Route::get('/cpdfp/{id}', [PelangganController::class, 'cpdfp'])->name('cpdfp')->middleware('auth');

Route::get('/dproduk', [ProdukController::class, 'dproduk'])->name('dproduk')->middleware('auth');
Route::get('/tdproduk', [ProdukController::class, 'tambahdata'])->name('tdproduk')->middleware('auth');
Route::get('/edproduk/{id}', [ProdukController::class, 'editdata'])->name('edproduk')->middleware('auth');

Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/loginproses', [UserController::class, 'loginproses'])->name('loginproses');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/registeruser', [UserController::class, 'registeruser'])->name('registeruser');
Route::get('/lupapassword', [UserController::class, 'lupapassword'])->name('lupapassword');