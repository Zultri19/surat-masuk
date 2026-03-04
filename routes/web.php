<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OperatorDashboardController;
use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

/*
|--------------------------------------------------------------------------
| PUBLIC
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('landing');
});

/* Jelajahi Surat (Publik) */
Route::get('/jelajahi-surat', [SuratMasukController::class, 'publicIndex'])
    ->name('surat.public');

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return redirect('/');
})->name('logout');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');

// Route::middleware(['auth','role:admin,operator'])->group(function () {

//     Route::get('/dashboard', [DashboardController::class, 'index'])
//         ->name('dashboard');

//     Route::resource('surat-masuk', SuratMasukController::class);

// });

Route::middleware(['auth','role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])
        ->name('admin.dashboard');
});

Route::middleware(['auth','role:operator'])->group(function () {
    Route::get('/operator/dashboard', [OperatorDashboardController::class, 'index'])
        ->name('operator.dashboard');
});

Route::middleware(['auth','role:admin'])->group(function () {    
    Route::resource('users', UserController::class);
});

/*
|--------------------------------------------------------------------------
| ADMIN (WAJIB LOGIN)
|--------------------------------------------------------------------------
*/

Route::resource('surat-masuk', SuratMasukController::class);

Route::get('/preview/{id}', [SuratMasukController::class, 'preview'])
    ->name('surat.preview');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

/*
|--------------------------------------------------------------------------
| PROFILE
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile/password', [ProfileController::class, 'passwordForm'])->name('profile.password.form');
    Route::post('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password.update');
});