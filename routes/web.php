<?php

use App\Http\Controllers\AduanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PelawatController;
use Illuminate\Support\Facades\Route;

// Halaman pelawat
Route::get('/', [PelawatController::class, 'halamanUtama']);
// Route ke invokable controller
Route::get('/dashboard', DashboardController::class);

Route::get('/contact', fn() => 'Halaman Hubungi');
Route::post('/contact', fn() => 'Borang hubungi telah berjaya dikirimkan');

Route::get('/aduan', fn() => 'Halaman aduan');

Route::get('/aduan/borang', [AduanController::class, 'create']);
Route::post('/aduan/borang', fn() => 'Borang telah berjaya dikirimkan');

Route::get('/aduan/{id}', fn() => 'Halaman maklumat / status aduan');

// Halaman pengurusan / admin
Route::get('/login', fn() => view('auth.template-login'))->name('login');
Route::post('/login', fn() => 'Authentication process');

Route::get('/logout', fn() => 'Logout berjaya');

Route::get('/password/reset', fn() => 'Halaman Borang Password Reset');
Route::post('/password/reset', fn() => 'Borang telah berjaya dikirimkan');




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


Route::group(['prefix' => 'admin'], function () {

    Route::resource('aduan', AduanController::class);

    Route::get('/users', fn() => view('users.template-senarai'));
    Route::get('/users/create', fn() => 'Halaman borang tambah user');
    Route::post('/users/create', fn() => 'Borang tambah user berjaya dihantar');
    Route::get('/users/{id}', fn() => 'Halaman detail users');
    Route::get('/users/{id}/edit', fn() => 'Halaman borang edit users');
    Route::patch('/users/{id}/edit', fn() => 'Borang edit berjaya dihantar');
    Route::delete('/users/{id}', fn() => 'Rekod users berjaya dihapuskan');
});
