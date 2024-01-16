<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\topup;
use App\Models\User;
use App\Exports\topupexport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;


class TopupController extends Controller
{
    public function index(){
        if (auth()->user()->role=="superadmin") {
            $topup = topup::with('kecamatan')->get();
            return view('transaksitopup.topup')->with('topup',$topup);
        }
        
        if (auth()->user()->role=="admin") {
            $user = User::find(auth()->user()->id);
            $topup = topup::with('kecamatan')->where('id_kecamatan_topup',$user->id_kecamatan_user)->get();
                  
            return view('transaksitopup.topup')->with('topup',$topup);
        }
       
        // with('customer')->where('id_customer_transaksi',$customer->customer_id)->get();
        
       
    }
    public function export(){
        return Excel::download(new topupexport,'topup.xlsx');
    }
}
