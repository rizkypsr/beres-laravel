<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class TokoapiController extends Controller
{
    public function index()
    {

        $toko = Customer::with('kecamatan')->get();
        // $kecamatan = kecamatan::all();
        return response()->json($toko);
    }
}
