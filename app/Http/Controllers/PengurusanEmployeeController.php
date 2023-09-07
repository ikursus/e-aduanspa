<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PengurusanEmployeeController extends Controller
{
    public function index()
    {
        $response = Http::get('https://dummy.restapiexample.com/api/v1/employees', ['verify' => false]);

        $dataEmployee = $response->json();

        return view('pengurusan.template-employee', compact('dataEmployee'));
    }
}
