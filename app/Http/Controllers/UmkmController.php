<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kecamatan;
use App\Models\umkm;
use App\Models\User;
use App\Models\produkumkm;

use Illuminate\Support\Facades\Validator;



class UmkmController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        if (auth()->user()->role=="superadmin") {
            $umkm = umkm::with('kecamatan')->where('umkm_is_delete',0)->get();
            $kecamatan = kecamatan::where('status_kecamatan',0)->get();
        return view('umkm.umkm')->with('umkm',$umkm)->with('kecamatan',$kecamatan);
        }
        
        if (auth()->user()->role=="admin") {
            $user = User::find(auth()->user()->id);
            $umkm = umkm::with('kecamatan')->where('umkm_is_delete',0)->where('id_kecamatan_umkm',$user->id_kecamatan_user)->get();
            $kecamatan = kecamatan::where('id_kecamatan',$user->id_kecamatan_user)->where('status_kecamatan',0)->get();            
            return view('umkm.umkm')->with('umkm',$umkm)->with('kecamatan',$kecamatan);
        }
       
        // with('customer')->where('id_customer_transaksi',$customer->customer_id)->get();
        
      
    }
    public function addumkm(Request $request)
    {
        $validation = Validator::make($request->all(),[
            'gambar_umkm' => 'max:2000',
            
            
    
    
         ]);
         if ($validation->fails()) {
            return redirect('/umkm')->with('warning', 'Ukuran gambar terlalu besar');
         }
        $fileextension = $request->file('gambar_umkm')->getClientOriginalExtension();
        $filename = time().".". $fileextension;
        $request->file('gambar_umkm')->move(public_path('/uploadumkm'), $filename); 
        
        $umkm = new umkm;
        $umkm->id_kecamatan_umkm = $request->input('id_kecamatan_umkm'); 
        $umkm->nama_umkm = $request->input('nama_umkm'); 
        $umkm->deskripsi_umkm = $request->input('deskripsi_umkm');
        $umkm->gambar_umkm = asset("uploadumkm/$filename");
        
        $umkm->save();
        
        return redirect("/umkm")->with('success', 'Berhasil Menambahkan UMKM');
    }
    public function updateumkm(Request $request,$id)
    {
        $validation = Validator::make($request->all(),[
            'gambar_umkm' => 'max:2000',
            
            
    
    
         ]);
         if ($validation->fails()) {
            return redirect('/umkm')->with('warning', 'Ukuran gambar terlalu besar');
         }
        if ($request->file('gambar_umkm')) {
            $fileextension = $request->file('gambar_umkm')->getClientOriginalExtension();
        $filename = time().".". $fileextension;
        $request->file('gambar_umkm')->move(public_path('/uploadumkm'), $filename); 
        
        $umkm = umkm::find($id);
        $umkm->id_kecamatan_umkm = $request->input('id_kecamatan_umkm'); 
        $umkm->nama_umkm = $request->input('nama_umkm'); 
        $umkm->deskripsi_umkm = $request->input('deskripsi_umkm');
        $umkm->gambar_umkm = asset("uploadumkm/$filename");
        
        $umkm->save();
        }else {
            $umkm = umkm::find($id);
            $umkm->id_kecamatan_umkm = $request->input('id_kecamatan_umkm'); 
            $umkm->nama_umkm = $request->input('nama_umkm'); 
            $umkm->deskripsi_umkm = $request->input('deskripsi_umkm');
            
            $umkm->save();
        }
        
        
        return redirect("/umkm")->with('success', 'Berhasil Update UMKM');
    }
    public function deleteumkm($id)
    {
     $umkm = umkm::find($id);
     $umkm->umkm_is_delete = 1;
     $umkm->save();

     $produkumkm = produkumkm::find($umkm->id_umkm);
     if ($produkumkm != null) {
        $produkumkm->produkumkm_is_delete = 1;
     $produkumkm->save();
     }
     

        
        return redirect("/umkm")->with('success', 'Berhasil Update UMKM');
    }
}
