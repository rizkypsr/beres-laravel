<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ppob;
use Illuminate\Support\Facades\Validator;


class PpobController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        if (auth()->user()->role=="superadmin" || auth()->user()->role=="adminppob") {
            $ppob = ppob::where('ppob_is_delete',0)->get();
            return view('ppob.ppob')->with('ppob',$ppob);
        }
        
       
       
        // with('customer')->where('id_customer_transaksi',$customer->customer_id)->get();
        
      
    }
    public function addppob(Request $request)
    {
        // $validation = Validator::make($request->all(),[
        //     'gambar_ppob' => 'max:2000',
            
            
    
    
        //  ]);
        //  if ($validation->fails()) {
        //     return redirect('/ppob')->with('warning', 'Ukuran gambar terlalu besar');
        //  }
        // $fileextension = $request->file('gambar_ppob')->getClientOriginalExtension();
        // $filename = time().".". $fileextension;
        // $request->file('gambar_ppob')->move(public_path('/uploadppob'), $filename); 
        
        $ppob = new ppob;
        $ppob->judul_ppob = $request->input('judul_ppob');
        $ppob->gambar_ppob = 'ppob';
        $ppob->save();
        
        return redirect("/ppob")->with('success', 'Berhasil Menambahkan PPOB');
    }
    public function updateppob(Request $request,$id)
    {
        // $validation = Validator::make($request->all(),[
        //     'gambar_ppob' => 'max:2000',
            
            
    
    
        //  ]);
        //  if ($validation->fails()) {
        //     return redirect('/ppob')->with('warning', 'Ukuran gambar terlalu besar');
        //  }
        
        //     $fileextension = $request->file('gambar_ppob')->getClientOriginalExtension();
        // $filename = time().".". $fileextension;
        // $request->file('gambar_ppob')->move(public_path('/uploadppob'), $filename); 
        
        $ppob = ppob::find($id);
        $ppob->judul_ppob = $request->input('judul_ppob');
        $ppob->gambar_ppob = 'ppob';
        $ppob->save();
        
     
        
        
        
        return redirect("/ppob")->with('success', 'Berhasil Update ppob');
    }
    public function deleteppob($id)
    {
     $ppob = ppob::find($id);
      $ppob->ppob_is_delete = 1;
      $ppob->save();

        return redirect("/ppob")->with('success', 'Berhasil Update ppob');
    }

}
