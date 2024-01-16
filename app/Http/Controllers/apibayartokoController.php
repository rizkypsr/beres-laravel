<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\bayartoko;
use App\Models\Customer;
use Carbon\Carbon;
use \Validator;

class apibayartokoController extends Controller
{
    public function index($id)
    {

        $bt = bayartoko::with('customer')->where('pengirim_bayar', $id)->get();
        // return view('ppob.ppob')->with('ppob',$ppob);
        return response()->json([
            'status' => 'success',
            'message' => 'data transfer',
            'data' => $bt,
        ]);
    }
    public function add(Request $request, $id)
    {
        $validate = Validator::make($request->all(), [
            // 'id_kecamatan_transfer' => 'required',
            // 'pengirim' => 'required',
            'toko_bayar' => 'required',
            // 'tanggal' => 'required',
            // 'tanggal_transaksi_ppob' => 'required',
            'nominal_bayar' => 'required',
            // 'total_js' => 'required',

        ]);
        if ($validate->fails()) {
            return response()->json([
                'status' => 'success',
                'msg' => "Get data successfully",
                'data' => $validate->errors()
            ], 400);
        }
        $bt = new bayartoko;
        $customerpengirim = Customer::find($id);
        if ($customerpengirim == null) {
            return response()->json([
                'status' => 'failed',
                'msg' => "data customer not found",
                'data' => null,
            ]);
        }
        if ($customerpengirim->saldo_customer < $bt->nominal_bayar) {
            return response()->json([
                'status' => 'success',
                'message' => 'Saldo Tidak Mencukupi',
                'data' => null,

            ]);
        }
        $customerpenerima = Customer::find($request->toko_bayar);
        if ($customerpenerima == null) {
            return response()->json([
                'status' => 'failed',
                'msg' => "data toko not found",
                'data' => null,
            ]);
        }
        if ($customerpenerima->role_customer != "toko") {
            return response()->json([
                'status' => 'success',
                'message' => 'penerima bukan toko',
                'data transfer' => null,
            ]);
        }

        if ($customerpenerima->role_customer == "toko") {
            $bt->id_kecamatan_bayar = $customerpengirim->id_kecamatan_customer;
            $bt->pengirim_bayar = $id;
            $bt->toko_bayar = $customerpenerima->id_customer;
            $bt->tanggal_bayar = Carbon::now()->format('Y-m-d');
            $bt->nominal_bayar = $request->nominal_bayar;
            $nominal = $bt->nominal_bayar;



            $bt->save();


            $saldopengirim = $customerpengirim->saldo_customer;
            $saldotransfer = $nominal;
            $saldoakhir = $saldopengirim - $saldotransfer;
            $customerpengirim->saldo_customer = $saldoakhir;
            $customerpengirim->save();




            $saldopenerima = $customerpenerima->saldo_customer;
            $saldotransferpenerima = $nominal;
            $saldoakhirpenerima = $saldopenerima + $saldotransferpenerima;
            $customerpenerima->saldo_customer = $saldoakhirpenerima;
            $customerpenerima->save();

            return response()->json([
                'status' => 'success',
                'message' => 'data transfer',
                'data transfer' => $bt,
                'data pengirim' => $customerpengirim,
                'data penerima' => $customerpenerima,
            ]);
        }












        // return view('ppob.ppob')->with('ppob',$ppob);SDSASF

    }
}
