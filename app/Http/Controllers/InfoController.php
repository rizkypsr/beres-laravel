<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\info;
use Illuminate\Support\Facades\Validator;


class InfoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {

        $info = info::all();


        return view('info.info')->with('info', $info);
    }
    public function addinfo(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'gambar_info' => 'max:2000',
        ]);

        if ($validation->fails()) {
            return redirect('/info')->with('warning', 'Ukuran gambar terlalu besar');
        }

        if ($request->hasFile('gambar_info')) {
            $image = $request->file('gambar_info');

            $imageName = time() . '_' . substr($image->getClientOriginalName(), 0, 50) . '.' . $image->getClientOriginalExtension();
            $image->storeAs('info', $imageName, 'public');
        }

        $info = Info::create([
            'gambar_info' => $imageName,
        ]);

        return redirect("/info")->with('success', 'Berhasil Menambahkan Info');
    }

    public function updateinfo(Request $request, $id)
    {

        $fileextension = $request->file('gambar_info')->getClientOriginalExtension();
        $filename = time() . "." . $fileextension;
        $request->file('gambar_info')->move(public_path('/uploadinfo'), $filename);

        $info = info::find($id);

        $info->gambar_info = asset("uploadinfo/$filename");
        $info->save();





        return redirect("/info")->with('success', 'Berhasil Update info');
    }
    public function deleteinfo($id)
    {
        info::find($id)->delete();

        return redirect("/info")->with('success', 'Berhasil Delete info');
    }
}
