<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\qurbansampah;

class QurbansampahapiController extends Controller
{
    public function index(){
        
        $qurban = qurbansampah::all();
        
        // with('customer')->where('id_customer_transaksi',$customer->customer_id)->get();
        
        return response()->json($qurban);
    }
}
