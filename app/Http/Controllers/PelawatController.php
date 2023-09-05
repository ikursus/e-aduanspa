<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PelawatController extends Controller
{
    // public
    // protected
    // private
    public function halamanUtama() {
        return view('guest.template-halaman-utama');
    }

    public function halamanHubungi() {
        return view('guest.template-halaman-hubungi');
    }
}
