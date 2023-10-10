<?php

use Illuminate\Support\Facades\Route;

// use App\Http\Controllers\AdminAuth
use App\Http\Controllers\AuthAdmin\LoginController as AdminLoginController;
use App\Http\Controllers\AuthAdmin\ForgotPasswordController as AdminForgotPasswordController;
use App\Http\Controllers\AuthAdmin\ResetPasswordController as AdminResetPasswordController;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;

use App\Http\Controllers\PostController;
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



// Rotas de Autenticação do Usuário
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login.show');
Route::post('login', [LoginController::class, 'login'])->name('login');
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register.show');
Route::post('register', [RegisterController::class, 'register'])->name('register');
Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

// Rota Home do Administrador
Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function () {
    // Rotas de Autenticação do Administrador
    Route::get('login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login.show');
    Route::post('login', [AdminLoginController::class, 'login'])->name('admin.login');
    Route::post('logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('password/reset', [AdminForgotPasswordController::class, 'showLinkRequestForm'])->name('admin.password.request');
    Route::post('password/email', [AdminForgotPasswordController::class, 'sendResetLinkEmail'])->name('admin.password.email');
    Route::get('password/reset/{token}', [AdminResetPasswordController::class, 'showResetForm'])->name('admin.password.reset');
    Route::post('password/reset', [AdminResetPasswordController::class, 'reset'])->name('admin.password.update');
    Route::post('logout', [AdminLoginController::class, 'logout'])->name('logout');

    // Rota Home do Administrador
    Route::get('home', function () {
        return 'Welcome Admin';
    });
});

Route::middleware('auth:web')->group(function () {
    Route::resource('post', PostController::class);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
