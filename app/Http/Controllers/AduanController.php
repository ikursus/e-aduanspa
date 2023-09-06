<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AduanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('aduan.template-borang');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_pengadu' => 'required|min:3|string', // Cara 1 pengasingan rule. Menggunakan |
            'email_pengadu' => ['required', 'email:filter', 'string'], // Cara 2 pengasingan rule. Guna Array
            'telefon_pengadu' => ['sometimes', 'nullable'],
            'jenis_aduan' => ['required', 'min:3', 'string'],
            'kandungan_aduan' => ['required', 'min:3', 'string'],
            'lokasi_aduan' => ['sometimes', 'nullable']
        ]);

        // Define data json untuk maklumat_aduan
        $maklumatAduan = [
            'kandungan_aduan' => $request->input('kandungan_aduan'),
            'lokasi_aduan' => $request->input('lokasi_aduan'),
        ];

        // Masukkan data ke dalam table aduan
        DB::table('aduan')->insert([
            'nama_pengadu' => $request->input('nama_pengadu'),
            'email_pengadu' => $request->input('email_pengadu'),
            'telefon_pengadu' => $request->input('telefon_pengadu'),
            'jenis_aduan' => $request->input('jenis_aduan'),
            'maklumat_aduan' => json_encode($maklumatAduan)
        ]);

        // Jika tiada masalah, beri respon kepada client
        return redirect()->route('aduan.thanks');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function thanks()
    {
        return view('aduan.template-tq');
    }
}
