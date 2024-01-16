<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\transaksippob;
use App\Models\transaksijs;
use App\Models\transfer;

class logController extends Controller
{
    public function index($id, $type)
    {
        $tpp = transaksippob::with('customer')->where('customer_ppob', $id)->get();
        $tjs = transaksijs::with('kecamatan')->with('customer')->with('produkjs')->where('id_cs_js', $id)->get();
        $transfer = transfer::with('customer')->where('pengirim', $id)->get();
        $transfer_penerima = transfer::with('customer')->where('penerima', $id)->get();

        if ($type == 'ppob') {
            return response()->json([
                'status' => 'success',
                'message' => 'data log',
                'data' => $tpp,
            ]);
        }

        if ($type == 'js') {
            return response()->json([
                'status' => 'success',
                'message' => 'data log',
                'data' => $tjs,
            ]);
        }

        if ($type == 'transfer') {
            return response()->json([
                'status' => 'success',
                'message' => 'data log',
                'data' => $transfer,
            ]);
        }

        if ($type == 'transfer_penerima') {
            return response()->json([
                'status' => 'success',
                'message' => 'data log',
                'data' => $transfer_penerima,
            ]);
        }

        return response()->json([
            'status' => 'failed',
            'message' => 'Tipe Log Tidak Ditemukan',
        ], 401);
    }
}
