<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginAdminController;
use App\Http\Controllers\RegisterAdminController;
use App\Http\Controllers\sendEmailController;
use App\Http\Controllers\MejaBackendController;
use App\Http\Controllers\MenuBackendController;
use App\Http\Controllers\ReservasiBackendController;
use App\Http\Controllers\PesananBackendController;
use App\Http\Controllers\PembayaranBackendController;
use App\Http\Controllers\UserBackendController;
use App\Http\Controllers\AdminBackendController;
use App\Http\Controllers\CustomerBackendController;
use App\Http\Controllers\OutletBackendController;
use App\Http\Controllers\BranchOutletBackendController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('frontend.content.home');
})->middleware('auth');


Route::get('/register', function () {
    return view('frontend.register-user');
});

Route::get('/reserve', function () {
    return view('frontend.content.reserve');
});

Route::get('/info', function () {
    return view('frontend.content.info');
});

Route::get('/show', function () {
    return view('frontend.content.showinfo');
});

Route::get('send-email', [sendEmailController::class, 'index']);

// User
Route::get('/login', [LoginController::class,'login'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class,'authenticate']);

Route::get('/register', [RegisterController::class,'index'])->name('register');
Route::post('/register', [RegisterController::class,'register']);
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');


Route::post('/logout', [LoginController::class,'logout']);


// Admin
Route::get('/login-admin', [LoginAdminController::class,'login'])->name('login')->middleware('guest');
Route::post('/login-admin', [LoginAdminController::class,'authenticate']);

Route::get('/register-admin', [RegisterAdminController::class,'index'])->name('register');
Route::post('/register-admin', [RegisterAdminController::class,'register']);
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/meja-backend');
})->middleware(['auth', 'signed'])->name('verification.verify');


Route::post('/logout-admin', [LoginAdminController::class,'logout-admin']);


Route::get('/meja', [MejaController::class,'index']);
Route::resource('meja-backend', MejaBackendController::class);

Route::get('/menu', [MenuController::class,'index']);
Route::resource('menu-backend', MenuBackendController::class);

// Route::get('/reserve', [ReservasiController::class,'index']);
Route::resource('reserve-backend', ReservasiBackendController::class);

Route::get('/order', [PesananController::class,'index']);
Route::resource('order-backend', PesananBackendController::class);

Route::get('/bayar', [PembayaranController::class,'index']);
Route::resource('bayar-backend', PembayaranBackendController::class);

Route::get('/user', [UserController::class,'index']);
Route::resource('user-backend', UserBackendController::class);

Route::get('/admin', [AdminController::class,'index']);
Route::resource('admin-backend', AdminBackendController::class);

Route::get('/customer', [CustomerController::class,'index']);
Route::resource('customer-backend', CustomerBackendController::class);

Route::get('/outlet', [OutletController::class,'index']);
Route::resource('outlet-backend', OutletBackendController::class);

Route::get('/branch', [BranchOutletController::class,'index']);
Route::resource('branch-backend', BranchOutletBackendController::class);

Route::get('/export_meja_pdf', [MejaBackendController::class,'export_meja_pdf'])->name('export_meja_pdf');
