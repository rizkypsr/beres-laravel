<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\transaksi;

class TransaksiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index($id)
    {

        $transaksi = transaksi::with('customer')->where('id_customer_transaksi', $id)->get();


        return view('customer.transaksi')->with('transaksi', $transaksi);
    }
}
