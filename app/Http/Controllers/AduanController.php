<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AduanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('aduan.template-index');
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
        // Generate no tiket untuk semakan status
        $no_tiket = Str::random('8'); // Hasilkan 8 huruf no.tiket

        // Masukkan data ke dalam table aduan
        DB::table('aduan')->insert([
            'no_tiket' => $no_tiket,
            'nama_pengadu' => $request->input('nama_pengadu'),
            'email_pengadu' => $request->input('email_pengadu'),
            'telefon_pengadu' => $request->input('telefon_pengadu'),
            'jenis_aduan' => $request->input('jenis_aduan'),
            'maklumat_aduan' => json_encode($maklumatAduan),
            'created_at' => now() // Carbon::now()
        ]);

        // Jika tiada masalah, beri respon kepada client
        return redirect()->route('aduan.thanks', ['tiket' => $no_tiket]);
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

    public function thanks(Request $request)
    {
        // Tetapkan $variable $aduan sebagai null JIKA tiada tiket
        $aduan = NULL;

        // Dapatkan data aduan jika ada tiket
        if ($request->has('tiket') && $request->filled('tiket'))
        {
            // Cari rekod tiket
            $aduan = DB::table('aduan')
            ->where('no_tiket', '=', $request->input('tiket'))
            ->first(); // LIMIT 1
        }

        return view('aduan.template-tq', compact('aduan'));
    }
}
