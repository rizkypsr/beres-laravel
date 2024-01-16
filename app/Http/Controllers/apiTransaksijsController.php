<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\transaksijs;
use App\Models\produkjs;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class apiTransaksijsController extends Controller
{
    public function index($id)
    {

        $tjs = transaksijs::with('kecamatan')->with('customer')->with('produkjs')->where('id_cs_js', $id)->get();
        return response()->json([
            'status' => 'success',
            'msg' => 'data transaksi',
            'data' => $tjs,
        ]);
    }
    public function add(Request $request, $id)
    {
        $validate = Validator::make($request->all(), [
            'jenissampah_js' => 'required',
        ]);

        if ($validate->fails()) {
            return response()->json([
                'status' => 'success',
                'msg' => "Get data successfully",
                'data' => $validate->errors()
            ], 400);
        }

        $customer = Customer::find($id);
        if ($customer == null) {
            return response()->json([
                'status' => 'failed',
                'msg' => "data not found",
                'data' => null,
            ]);
        }

        foreach ($request->jenissampah_js as $key => $value) {
            if ($value['jumlah_js'] > 0) {
                $js = produkjs::find($value['id_js']);
                if ($js == null) {
                    return response()->json([
                        'status' => 'failed',
                        'msg' => "data not found",
                        'data' => null,
                    ]);
                }


                $tjs = new transaksijs;


                $tjs->id_cs_js =  $id;
                $tjs->id_kc_js =  $customer->id_kecamatan_customer;
                $tjs->jenissampah_js = $js->id_js;
                $tjs->satuan_js = $js->satuan_js;
                $tjs->jumlah_js = $value['jumlah_js'];
                if ($tjs->jumlah_js == 0) {
                    return response()->json([
                        'status' => 'failed',
                        'msg' => "data tidak bisa nol",
                        'data' => null,
                    ]);
                }
                $jumlah = $tjs->jumlah_js;

                $tjs->harga_js = $js->harga_js;
                $harga = $tjs->harga_js;
                $totalakhir = $jumlah * $harga;
                $tjs->total_js = $totalakhir;
                $tjs->status_js = 'belum diproses';
                $tjs->created_at = Carbon::now();

                $tjs->save();
            }
        }

        return response()->json([
            'status' => 'success',
            'msg' => "Get data successfully",
            // 'data jual sampah' => $tjs,
            // 'data customer' => $customer,
            // 'data topup' => $topup,

        ]);
    }
}
