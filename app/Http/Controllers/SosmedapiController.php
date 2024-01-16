<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sosmed;

class SosmedapiController extends Controller
{
     public function indexwa(){
    $wa = sosmed::where('nama_sosmed','whatsapp')->get();
    return response()->json($wa);
}
public function indexte(){
    $te = sosmed::where('nama_sosmed','telegram')->get();
    return response()->json($te);
}
}
