<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\topup;
use App\Models\transaksi;
use App\Models\kecamatan;
use App\Models\User;
use Carbon\Carbon;

class TokoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        if (auth()->user()->role == "superadmin") {
            $toko = Customer::with('kecamatan')->where('role_customer', 'toko')->get();
            $kecamatan = kecamatan::where('status_kecamatan', 0)->get();
            return view('toko.toko')->with('toko', $toko)->with('kecamatan', $kecamatan);
        }
        if (auth()->user()->role == "admin") {
            $user = User::find(auth()->user()->id);
            $toko = Customer::with('kecamatan')->where('id_kecamatan_customer', $user->id_kecamatan_user)->where('role_customer', 'toko')->get();
            $kecamatan = kecamatan::where('id_kecamatan', $user->id_kecamatan_user);
            return view('toko.toko')->with('toko', $toko)->with('kecamatan', $kecamatan);
        }

        // with('customer')->where('id_customer_transaksi',$customer->customer_id)->get();


    }
    public function addtoko(Request $request)
    {

        if (Customer::find($request->input('id_customer'))) {
            return redirect('/toko')->with('warning', 'Id Toko sudah tersedia');
        }

        $toko = new Customer;
        $toko->id_customer = $request->input('id_customer');
        $toko->id_kecamatan_customer = $request->input('id_kecamatan_customer');
        $toko->nama = $request->input('nama');
        $toko->alamat_customer = $request->input('alamat_customer');
        $toko->saldo_customer = $request->input('saldo_customer');
        $toko->pin_customer = Hash::make($request->pin_customer);
        $toko->no_hp_customer = $request->input('no_hp_customer');
        $toko->tempat_lahir = $request->input('tempat_lahir');
        $toko->tgl_lahir = $request->input('tgl_lahir');
        $toko->role_customer = 'toko';
        $toko->save();

        return redirect("/toko")->with('success', 'Berhasil Menambahkan Toko');
    }
    public function updatetoko(Request $request, $id)
    {

        $toko = Customer::find($id);
        // $toko->id_customer = $request->input('id_customer'); 
        $toko->id_kecamatan_customer = $request->input('id_kecamatan_customer');
        $toko->nama = $request->input('nama');
        $toko->alamat_customer = $request->input('alamat_customer');
        // $toko->saldo_customer = $request->input('saldo_customer');
        $toko->no_hp_customer = $request->input('no_hp_customer');
        $toko->tempat_lahir = $request->input('tempat_lahir');
        $toko->tgl_lahir = $request->input('tgl_lahir');
        $toko->role_customer = 'toko';

        if ($request->input('pin_customer')) {
            $toko->pin_customer = Hash::make($request->pin_customer);
        }

        $toko->save();

        return redirect("/toko")->with('success', 'Berhasil Update toko');
    }
    public function deletetoko($id)
    {
        Customer::find($id)->delete();

        return redirect("/toko")->with('success', 'Berhasil Menghapus toko');
    }
    public function topuptoko(Request $request, $id)
    {

        $toko = Customer::find($id);

        $saldoawal = $toko->saldo_customer;
        $saldotopup = $request->input('saldo_customer');
        $saldoakhir = $saldoawal + $saldotopup;
        $toko->saldo_customer = $saldoakhir;
        $toko->save();

        $topup = new topup;
        $topup->nama_customer_topup = $toko->nama;
        $topup->id_kecamatan_topup = $toko->id_kecamatan_customer;
        $topup->tanggal_topup = Carbon::now();
        $topup->nominal_topup = $saldotopup;
        $topup->total_saldo_topup = $toko->saldo_customer;
        $topup->save();

        return redirect("/toko")->with('success', 'Berhasil menambahkan saldo');
    }
}
