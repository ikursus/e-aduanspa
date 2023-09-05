<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
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
    }
}
