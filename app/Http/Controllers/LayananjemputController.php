<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\layananjemput;
use App\Models\kecamatan;
use App\Models\User;
use Carbon\Carbon;


class LayananjemputController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        if (auth()->user()->role == "superadmin") {
            $lj = layananjemput::with('kecamatan')->with('customer')->get();
            $kecamatan = kecamatan::where('status_kecamatan', 0)->get();
            $customer = customer::where('customer_is_delete', 0)->get();
            return view('layananjemput.layananjemput')->with('lj', $lj)->with('kecamatan', $kecamatan)->with('customer', $customer);
        }
        if (auth()->user()->role == "admin") {
            $user =  User::find(auth()->user()->id);
            $lj = layananjemput::with('kecamatan')->with('customer')->where('kecamatan_layanan', $user->id_kecamatan_user)->get();
            $kecamatan = kecamatan::where('id_kecamatan', $user->id_kecamatan_user)->get();
            $customer = customer::where('id_kecamatan_customer', $user->id_kecamatan_user)->where('customer_is_delete', 0)->get();
            return view('layananjemput.layananjemput')->with('lj', $lj)->with('kecamatan', $kecamatan)->with('customer', $customer);
        }


        // with('customer')->where('id_customer_transaksi',$customer->customer_id)->get();

        return view('layananjemput.layananjemput')->with('lj', $lj)->with('kecamatan', $kecamatan);
    }
    public function addlj(Request $request)
    {
        $customer = Customer::find($request->input('nama_layanan'));

        $lj = new layananjemput;
        $lj->kecamatan_layanan = $request->input('kecamatan_layanan');
        $lj->nama_layanan = $request->input('nama_layanan');
        $lj->alamat_layanan = $request->input('alamat_layanan');
        $lj->no_hp_layanan = $request->input('no_hp_layanan');
        $lj->jenis_sampah_layanan = $request->input('jenis_sampah_layanan');
        $lj->status_layanan = 'belum diproses';
        $lj->created_at = Carbon::now();


        $lj->save();

        return redirect("/lj")->with('success', 'Berhasil Menambahkan layanan jemput sampah');
    }
    public function updatelj(Request $request, $id)
    {

        $lj = layananjemput::find($id);
        // $lj->kecamatan_layanan = $request->input('kecamatan_layanan'); 
        // $lj->nama_layanan = $request->input('nama_layanan'); 
        $lj->alamat_layanan = $request->input('alamat_layanan');
        $lj->no_hp_layanan = $request->input('no_hp_layanan');
        $lj->jenis_sampah_layanan = $request->input('jenis_sampah_layanan');



        $lj->save();



        return redirect("/lj")->with('success', 'Berhasil Update layanan jemput sampah');
    }
    public function deletelj($id)
    {
        layananjemput::find($id)->delete();

        return redirect("/lj")->with('success', 'Berhasil hapus layanan jemput sampah');
    }
    public function acclj(Request $request, $id)
    {

        $lj = layananjemput::find($id);
        $lj->status_layanan = 'sedang diproses';

        $lj->save();



        return redirect("/lj")->with('success', 'Berhasil Update layanan');
    }
    public function selesailj(Request $request, $id)
    {

        $lj = layananjemput::find($id);
        $lj->status_layanan = 'selesai';

        $lj->save();



        return redirect("/lj")->with('success', 'Berhasil Update layanan');
    }
    public function totallayanan()
    {
        if (auth()->user()->role == "superadmin") {
            $lj = layananjemput::where('status_layanan', 'belum diproses')->count();

            echo json_encode($lj);
        }
        if (auth()->user()->role == "admin") {
            $user =  User::find(auth()->user()->id);
            $lju = layananjemput::where('kecamatan_layanan', $user->id_kecamatan_user)->where('status_layanan', 'belum diproses')->count();
            echo json_encode($lju);
        }
    }
    public function totallayanandiproses()
    {
        if (auth()->user()->role == "superadmin") {
            $lj = layananjemput::where('status_layanan', 'sedang diproses')->count();

            echo json_encode($lj);
        }
        if (auth()->user()->role == "admin") {
            $user =  User::find(auth()->user()->id);
            $lju = layananjemput::where('kecamatan_layanan', $user->id_kecamatan_user)->where('status_layanan', 'sedang diproses')->count();
            echo json_encode($lju);
        }
    }
}
