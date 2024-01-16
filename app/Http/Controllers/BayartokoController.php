<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\bayartoko;
use App\Models\User;
use App\Exports\bayartokoexport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class BayartokoController extends Controller
{
    public function index(){
        if (auth()->user()->role=="superadmin") {
            $bayar = bayartoko::with('kecamatan','customer','customertoko')->get();
            return view('bayartoko.bayartoko')->with('bayar',$bayar);
        }
        
        if (auth()->user()->role=="admin") {
            $user = User::find(auth()->user()->id);
            $bayar = bayartoko::with('kecamatan','customer','customertoko')->where('id_kecamatan_bayar',$user->id_kecamatan_user)->get();
                  
            return view('bayartoko.bayartoko')->with('bayar',$bayar);
        }
       
       
        // with('customer')->where('id_customer_transaksi',$customer->customer_id)->get();
        
      
}
public function export(){
    return Excel::download(new bayartokoexport,'bayartoko.xlsx');
}
}
