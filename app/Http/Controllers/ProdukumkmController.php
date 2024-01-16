<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\produkumkm;
use App\Models\umkm;
use Illuminate\Support\Facades\Validator;


class ProdukumkmController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        
        $produkumkm = produkumkm::with('umkm')->where('produkumkm_is_delete',0)->get();
        $umkm = umkm::where('umkm_is_delete',0)->get();
       
        // with('customer')->where('id_customer_transaksi',$customer->customer_id)->get();
        
        return view('umkm.produkumkm')->with('umkm',$umkm)->with('produkumkm',$produkumkm);
    }
    public function addprodukumkm(Request $request)
    {
        $validation = Validator::make($request->all(),[
            'gambar_produk_umkm' => 'max:2000',
            
            
    
    
         ]);
         if ($validation->fails()) {
            return redirect('/produkumkm')->with('warning', 'Ukuran gambar terlalu besar');
         }
        $fileextension = $request->file('gambar_produk_umkm')->getClientOriginalExtension();
        $filename = time().".". $fileextension;
        $request->file('gambar_produk_umkm')->move(public_path('/uploadprodukumkm'), $filename); 
        
        $produkumkm = new produkumkm;
        $produkumkm->id_umkm_produk = $request->input('id_umkm_produk'); 
        $produkumkm->nama_produk_umkm = $request->input('nama_produk_umkm'); 
        $produkumkm->gambar_produk_umkm = asset("uploadprodukumkm/$filename");
        $produkumkm->deskripsi_produk_umkm = $request->input('deskripsi_produk_umkm');

        $produkumkm->save();
        
        return redirect("/produkumkm")->with('success', 'Berhasil Menambahkan Umkm');
    }
    public function updateprodukumkm(Request $request,$id)
    {
        $validation = Validator::make($request->all(),[
            'gambar_produk_umkm' => 'max:2000',
            
            
    
    
         ]);
         if ($validation->fails()) {
            return redirect('/produkumkm')->with('warning', 'Ukuran gambar terlalu besar');
         }
        if ($request->file('gambar_produk_umkm')) {
            $fileextension = $request->file('gambar_produk_umkm')->getClientOriginalExtension();
        $filename = time().".". $fileextension;
        $request->file('gambar_produk_umkm')->move(public_path('/uploadprodukumkm'), $filename); 
        
        $produkumkm = produkumkm::find($id);
        $produkumkm->id_umkm_produk = $request->input('id_umkm_produk'); 
        $produkumkm->nama_produk_umkm = $request->input('nama_produk_umkm'); 
        $produkumkm->gambar_produk_umkm = asset("uploadprodukumkm/$filename");
        $produkumkm->deskripsi_produk_umkm = $request->input('deskripsi_produk_umkm');
        
        $produkumkm->save();
        }else {
            $produkumkm = produkumkm::find($id);
        $produkumkm->id_umkm_produk = $request->input('id_umkm_produk'); 
        $produkumkm->nama_produk_umkm = $request->input('nama_produk_umkm'); 
        $produkumkm->deskripsi_produk_umkm = $request->input('deskripsi_produk_umkm');
            
            $produkumkm->save();
        }
        
        
        return redirect("/produkumkm")->with('success', 'Berhasil Update produkumkm');
    }
    public function deleteprodukumkm($id)
    {
     $pu = produkumkm::find($id);
     $pu->produkumkm_is_delete = 1;
     $pu->save();
        
        return redirect("/produkumkm")->with('success', 'Berhasil Update umkm');
    }
}
