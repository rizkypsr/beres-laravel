<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\faq;

class FaqController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $faq = faq::all();
        return view('faq.faq')->with('faq',$faq);
    }
    public function addfaq(Request $request)
    {
   
        $faq = new faq;
        $faq->judul_faq = $request->input('judul_faq');
        $faq->deskripsi_faq = $request->input('deskripsi_faq');
        $faq->save();
        
        return redirect('/faq')->with('success', 'Berhasil Menambahkan faq');
    }
    public function updatefaq(Request $request, $id)
    {
   
        $faq = faq::find($id);
        $faq->judul_faq = $request->input('judul_faq');
        $faq->deskripsi_faq = $request->input('deskripsi_faq');
        $faq->save();
        
        return redirect('/faq')->with('success', 'Berhasil update faq');
    }
    public function deletefaq(Request $request, $id)
    {
   
        $faq = faq::find($id);
        
        $faq->delete();
        
        return redirect('/faq')->with('success', 'Berhasil Delete faq');
    }
}
