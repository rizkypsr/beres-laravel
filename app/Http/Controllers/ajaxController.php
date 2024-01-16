<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\transaksippob;
use App\Models\transaksijs;
use App\Models\User;
use App\Models\layananjemput;


class ajaxController extends Controller
{
    public function ajax(){
        $ppobbelum = transaksippob::where('status_ppob','belum diproses')->count();
        $ppobsedang = transaksippob::where('status_ppob','sedang diproses')->count();

        if (auth()->user()->role=="superadmin") {
            $tjs = transaksijs::where('status_js','belum diproses')->count();
            $lj = layananjemput::where('status_layanan','belum diproses')->count();
            $tjssedang = transaksijs::where('status_js','sedang diproses')->count();
            $ljsedang = layananjemput::where('status_layanan','sedang diproses')->count();

            
        }
        if (auth()->user()->role=="admin") {
            $user = User::find(auth()->user()->id);
            $tjs = transaksijs::where('id_kc_js',$user->id_kecamatan_user)->where('status_js','belum diproses')->count();
            $tjssedang = transaksijs::where('id_kc_js',$user->id_kecamatan_user)->where('status_js','sedang diproses')->count();
            $lj = layananjemput::where('kecamatan_layanan',$user->id_kecamatan_user)->where('status_layanan','belum diproses')->count();
            $ljsedang = layananjemput::where('kecamatan_layanan',$user->id_kecamatan_user)->where('status_layanan','sedang diproses')->count();

            
        }

       

       
       
        return response()->json(
            [
            'ppobbelum'=>$ppobbelum,
            'ppobsedang'=>$ppobsedang,
            'tjs'=>$tjs,
            'lj'=>$lj,
            'tjssedang'=>$tjssedang,
            'ljsedang'=>$ljsedang,
           
            
        ]
        );
    }
   
}
