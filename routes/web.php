<?php

use Illuminate\Support\Facades\Route;

// Halaman pelawat
Route::get('/', function() {
    return view('guest.template-halaman-utama');
});

Route::get('/contact', fn() => 'Halaman Hubungi');
Route::post('/contact', fn() => 'Borang hubungi telah berjaya dikirimkan');

Route::get('/aduan', fn() => 'Halaman aduan');

Route::get('/aduan/borang', fn() => 'Halaman borang aduan');
Route::post('/aduan/borang', fn() => 'Borang telah berjaya dikirimkan');

Route::get('/aduan/{id}', fn() => 'Halaman maklumat / status aduan');

// Halaman pengurusan / admin
Route::get('/login', fn() => view('auth.template-login'))->name('login');
Route::post('/login', fn() => 'Authentication process');

Route::get('/logout', fn() => 'Logout berjaya');

Route::get('/password/reset', fn() => 'Halaman Borang Password Reset');
Route::post('/password/reset', fn() => 'Borang telah berjaya dikirimkan');

Route::get('/dashboard', function () {

    // Data aduan
    $senaraiAduan = [
        // Data 1
        [
            'nama_pengadu' => 'Ali',
            'email_pengadu' => 'ali@gmail.com',
            'telefon_pengadu' => '0123456789',
            'jenis_aduan' => 'Aduan ICT',
            'tarikh_aduan' => '2023-09-05',
            'status_aduan' => 'baru'
        ],
        // Data 2
        [
            'nama_pengadu' => 'Abu',
            'email_pengadu' => 'abu@gmail.com',
            'telefon_pengadu' => '0123456789',
            'jenis_aduan' => 'Aduan ICT',
            'tarikh_aduan' => '2023-09-05',
            'status_aduan' => 'baru'
        ],
        // Data 3
        [
            'nama_pengadu' => 'Siti',
            'email_pengadu' => 'siti@gmail.com',
            'telefon_pengadu' => '0123456789',
            'jenis_aduan' => 'Aduan ICT',
            'tarikh_aduan' => '2023-09-05',
            'status_aduan' => 'baru'
        ],
        // Data 4
        [
            'nama_pengadu' => 'Ah Chong',
            'email_pengadu' => 'ahchong@gmail.com',
            'telefon_pengadu' => '0123456789',
            'jenis_aduan' => 'Aduan ICT',
            'tarikh_aduan' => '2023-09-05',
            'status_aduan' => 'baru'
        ],
        // Data 5
        [
            'nama_pengadu' => 'Upin',
            'email_pengadu' => 'upin@gmail.com',
            'telefon_pengadu' => '0123456789',
            'jenis_aduan' => 'Aduan ICT',
            'tarikh_aduan' => '2023-09-05',
            'status_aduan' => 'baru'
        ],
    ];

    $pageTitle = 'Halaman Dashboard';

    // Beri respon view TANPA data
    // return view('template-dashboard');

    // Cara 1 - Beri Respon view DENGAN data
    // return view('template-dashboard')
    // ->with('senaraiAduan', $senaraiAduan)
    // ->with('pageTitle', $pageTitle);

    // Cara 2 - Beri Respon view DENGAN data
    // return view('template-dashboard', [
    //     'senaraiAduan' => $senaraiAduan,
    //     'pageTitle' => $pageTitle
    // ]);

    // Cara 3 - Beri Respon view DENGAN data
    return view('template-dashboard', compact('senaraiAduan', 'pageTitle'));
});


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

    Route::get('/aduan', fn() => view('template-aduan'));
    Route::get('/aduan/{id}', fn() => 'Halaman detail aduan');
    Route::get('/aduan/{id}/edit', fn() => 'Halaman borang edit aduan');
    Route::patch('/aduan/{id}/edit', fn() => 'Borang edit berjaya dihantar');
    Route::delete('/aduan/{id}', fn() => 'Rekod aduan berjaya dihapuskan');


    Route::get('/users', fn() => view('users.template-senarai'));
    Route::get('/users/create', fn() => 'Halaman borang tambah user');
    Route::post('/users/create', fn() => 'Borang tambah user berjaya dihantar');
    Route::get('/users/{id}', fn() => 'Halaman detail users');
    Route::get('/users/{id}/edit', fn() => 'Halaman borang edit users');
    Route::patch('/users/{id}/edit', fn() => 'Borang edit berjaya dihantar');
    Route::delete('/users/{id}', fn() => 'Rekod users berjaya dihapuskan');
});
