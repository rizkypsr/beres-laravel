<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\layananjemput;
use \Validator;
use Carbon\Carbon;


class LayananjemputapiController extends Controller
{
    public function index(){
         
            $lj = layananjemput::with('kecamatan')->get();
            // $kecamatan = kecamatan::all();
            return response()->json($lj);
        }
        public function add(Request $request){
            $validate = Validator::make($request->all(), [
                'kecamatan_layanan' => 'required',
                'nama_layanan' => 'required',
                'alamat_layanan' => 'required',
                'no_hp_layanan' => 'required',
                'jenis_sampah_layanan' => 'required',
                // 'status_layanan' => 'required',
                // 'total_js' => 'required',
            
            ]);
            if ($validate->fails()) {
                return response()->json([
                    'status' => 'success',
                    'msg' => "Get data successfully",
                    'data' => $validate->errors()
                ], 400);
            }
            // $customer = customer::find($request->id_customer);
            // $kecamatan = kecamatan::find($request->id_kecamatan);
            $lj = new layananjemput;
            $lj->kecamatan_layanan =  $request->kecamatan_layanan; 
            if ($lj->kecamatan_layanan == 0) {
                return response()->json([
                    "status" => 'error',
                    'msg' => 'harap isi kecamatan',
                ]);
            }
            $lj->nama_layanan =  $request->nama_layanan; 
            $lj->alamat_layanan = $request->alamat_layanan;
            $lj->no_hp_layanan = $request->no_hp_layanan;
            $lj->jenis_sampah_layanan = $request->jenis_sampah_layanan;
            $lj->status_layanan = 'belum diproses';
            $lj->created_at = Carbon::now();
          
    
            $lj->save();
    
            return response()->json([
                'status' => 'success' ,
                'msg' => "Get data successfully",
                'data' => $lj,
                
            ]);
        }
}
