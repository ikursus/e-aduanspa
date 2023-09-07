<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AduanController;
use App\Http\Controllers\PelawatController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PengurusanUserController;
use App\Http\Controllers\PengurusanAduanController;
use App\Http\Controllers\PengurusanEmployeeController;

// Halaman pelawat
Route::get('/', [PelawatController::class, 'halamanUtama'])->name('homepage');
// Route ke invokable controller
Route::get('/dashboard', DashboardController::class)->name('dashboard');

// Route aduan untuk pelawat
Route::get('/aduan', [AduanController::class, 'index'])->name('aduan.index');
// Route untuk paparkan borang aduan
Route::get('/aduan/borang', [AduanController::class, 'create'])->name('aduan.create');
// Route untuk terima data daripada borang aduan
Route::post('/aduan/borang', [AduanController::class, 'store'])->name('aduan.store');

Route::get('/aduan/terima-kasih', [AduanController::class, 'thanks'])->name('aduan.thanks');

Route::get('/aduan/{id}', fn() => 'Halaman maklumat / status aduan')->name('aduan.show');

// Halaman pengurusan / admin
Route::get('/login', fn() => view('auth.template-login'))->name('login');
Route::post('/login', fn() => 'Authentication process')->name('login.authenticate');

Route::get('/logout', fn() => 'Logout berjaya')->name('logout');

Route::get('/password/reset', fn() => 'Halaman Borang Password Reset')->name('password.form');
Route::post('/password/reset', fn() => 'Borang telah berjaya dikirimkan')->name('password.reset');

// Routing untuk admin pengurusan

// Route::get('/admin/aduan', fn() => 'Halaman senarai pengurusan aduan');
// Route::get('/admin/aduan/{id}', fn() => 'Halaman detail aduan');
// Route::get('/admin/aduan/{id}/edit', fn() => 'Halaman borang edit aduan');
// Route::patch('/admin/aduan/{id}/edit', fn() => 'Borang edit berjaya dihantar');
// Route::delete('/admin/aduan/{id}', fn() => 'Rekod aduan berjaya dihapuskan');

// Route::get('/admin/users', fn() => 'Halaman senarai pengurusan users');
// Route::get('/admin/users/create', fn() => 'Halaman borang tambah user');
// Route::post('/admin/users/create', fn() => 'Borang tambah user berjaya dihantar');
// Route::get('/admin/users/{id}', fn() => 'Halaman detail users');
// Route::get('/admin/users/{id}/edit', fn() => 'Halaman borang edit users');
// Route::patch('/admin/users/{id}/edit', fn() => 'Borang edit berjaya dihantar');
// Route::delete('/admin/users/{id}', fn() => 'Rekod users berjaya dihapuskan');

Route::group([
    'prefix' => 'admin',
    'as' => 'admin.'
], function () {

    // Route untuk pengurusan aduan
    Route::patch('aduan/bulk', [PengurusanAduanController::class, 'updateBulk'])->name('aduan.bulk.update');
    Route::resource('aduan', PengurusanAduanController::class);
    Route::resource('users', PengurusanUserController::class);

    Route::get('employee', [PengurusanEmployeeController::class, 'index'])->name('employee.index');

    // Cara untuk memilih function yang diperlukan sahaja untuk route resource
    //Route::resource('aduan', PengurusanAduanController::class)->only('create', 'store');

    // Cara untuk memilih function yang tidak diperlukan untuk route resource
    //Route::resource('aduan', PengurusanAduanController::class)->except('destroy');

    // Route::get('/users', fn() => view('users.template-senarai'));
    // Route::get('/users/create', fn() => 'Halaman borang tambah user');
    // Route::post('/users/create', fn() => 'Borang tambah user berjaya dihantar');
    // Route::get('/users/{id}', fn() => 'Halaman detail users');
    // Route::get('/users/{id}/edit', fn() => 'Halaman borang edit users');
    // Route::patch('/users/{id}/edit', fn() => 'Borang edit berjaya dihantar');
    // Route::delete('/users/{id}', fn() => 'Rekod users berjaya dihapuskan');
});
