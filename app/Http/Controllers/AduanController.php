<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        $data = $request->validate([
            'nama_pengadu' => 'required|min:3|string', // Cara 1 pengasingan rule. Menggunakan |
            'email_pengadu' => ['required', 'email:filter', 'string'], // Cara 2 pengasingan rule. Guna Array
            'telefon_pengadu' => ['sometimes', 'nullable'],
            'jenis_aduan' => ['required', 'min:3', 'string'],
            'maklumat_aduan' => ['required', 'min:3', 'string']
        ]);



        // Dapatkan SEMUA data daripada borang aduan
        // $data = $request->all();

        // $data = $request->only('nama_pengadu', 'email_pengadu');
        // $data = $request->except('_token');

        // Dump and die
        // return $data;
        dd($data);
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
}
