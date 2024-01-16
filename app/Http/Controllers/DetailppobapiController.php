<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\detailppob;

class DetailppobapiController extends Controller
{
    public function index($id){
        
        $detailppob = detailppob::with('ppob')->where('id_ppob_detail',$id)->where('detailppob_is_delete',0)->get();
        // $ppob = ppob::all();
       
        // with('customer')->where('id_customer_transaksi',$customer->customer_id)->get();
        
        return response()->json([
            'status' => 'success',
            'msg' => 'data detail ppob',
            'data' => $detailppob,
        ]);
    }
}
