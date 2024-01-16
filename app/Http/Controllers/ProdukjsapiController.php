<?php

namespace App\Http\Controllers;

use App\Models\produkjs;

class ProdukjsapiController extends Controller
{
    public function index($id)
    {

        $produkjs = produkjs::where('js_is_delete', 0)
            ->where('id_kecamatan', $id)->get();


        // with('customer')->where('id_customer_transaksi',$customer->customer_id)->get();

        return response()->json([
            'status' => 'success',
            'msg' => 'data produkjs',
            'data' => $produkjs,
        ]);
    }
}
