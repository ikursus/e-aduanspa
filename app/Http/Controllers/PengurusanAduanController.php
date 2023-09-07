<?php

namespace App\Http\Controllers;

use App\Models\Aduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PengurusanAduanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Dapatkan senarai aduan
        // $senaraiAduan = DB::table('aduan')->get();
        // option selain ->get();
        // ->cursor();

        $senaraiAduan = Aduan::get();

        return view('pengurusan.aduan.template-index', compact('senaraiAduan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    //public function edit(string $id)
    public function edit(Aduan $aduan)
    {
        // Dapatkan data aduan yang ingin di edit
        // $aduan = DB::table('aduan')->where('id', $id)->first();
        // $aduan = Aduan::where('id', $id)->first(); // Aduan::where('id', $id)->firstOrFail();
        // $aduan = Aduan::find($id); // Aduan::findOrFail($id);

        // Decode data json dari column maklumat aduan
        $maklumatAduan = json_decode($aduan->maklumat_aduan, true);

        return view('pengurusan.aduan.template-edit', compact('aduan', 'maklumatAduan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
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

        // Kemaskini data ke dalam table aduan
        DB::table('aduan')
        ->where('id', '=', $id)
        //->where('created_at', '>=', '2020')
        ->update([
            'nama_pengadu' => $request->input('nama_pengadu'),
            'email_pengadu' => $request->input('email_pengadu'),
            'telefon_pengadu' => $request->input('telefon_pengadu'),
            'jenis_aduan' => $request->input('jenis_aduan'),
            'maklumat_aduan' => json_encode($maklumatAduan),
            'updated_at' => now() // Carbon::now()
        ]);

        // Jika tiada masalah, beri respon kepada client
        return redirect()->route('admin.aduan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('aduan')->where('id', '=', $id)->delete();

        // Jika tiada masalah, beri respon kepada client
        return redirect()->route('admin.aduan.index')->with('mesej-berjaya', 'Rekod berjaya dihapuskan');

    }

    public function updateBulk(Request $request)
    {
        $dataId = $request->input('id_aduan');

        DB::table('aduan')
        ->whereIn('id', $dataId)
        ->update([
            'status_aduan' => 'updated'
        ]);

        return redirect()->route('admin.aduan.index')->with('mesej-berjaya', 'Rekod yang dipilih berjaya dikemaskini');
    }
}
