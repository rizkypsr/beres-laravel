<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\transaksippob;
use App\Models\topup;
use App\Models\User;
use App\Models\transfer;
use App\Models\transaksijs;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (auth()->user()->role == "superadmin" || auth()->user()->role == "adminppob") {

            $customerbar = Customer::where('role_customer', 'customer')->count();
            $customertoko = Customer::where('role_customer', 'toko')->count();

            $tpp = transaksippob::select('bayar_transaksi_ppob', 'tanggal_transaksi_ppob')->whereYear('tanggal_transaksi_ppob', Carbon::now()->format('Y'))->get()->groupBy(function ($data) {
                return Carbon::parse($data->tanggal_transaksi_ppob)->format('m');
            });
            $usermcount = [];
            $userArr = [];

            foreach ($tpp as $key => $value) {
                $total = 0;
                foreach ($value as $item) {
                    $total += $item->bayar_transaksi_ppob;
                }
                $usermcount[(int)$key] = $total;
            }

            for ($i = 1; $i <= 12; $i++) {
                if (!empty($usermcount[$i])) {
                    $userArr[] = $usermcount[$i];
                } else {
                    $userArr[] = 0;
                }
            }

            $topup = topup::select('tanggal_topup', 'nominal_topup')->whereYear('tanggal_topup', Carbon::now()->format('Y'))->get()->groupBy(function ($dat) {
                return Carbon::parse($dat->tanggal_topup)->format('m');
            });
            $userm = [];
            $userAr = [];

            foreach ($topup as $kiy => $val) {
                $total_topup = 0;
                foreach ($val as $hitem) {
                    $total_topup += $hitem->nominal_topup;
                }
                $userm[(int)$kiy] = $total_topup;
            }

            for ($i = 1; $i <= 12; $i++) {
                if (!empty($userm[$i])) {
                    $userAr[] = $userm[$i];
                } else {
                    $userAr[] = 0;
                }
            }

            $transaksijs = transaksijs::select('created_at', 'total_js')->whereYear('created_at', Carbon::now()->format('Y'))->get()->groupBy(function ($da) {
                return Carbon::parse($da->created_at)->format('m');
            });
            $user = [];
            $userA = [];

            foreach ($transaksijs as $koy => $vel) {
                $total_bayar = 0;
                foreach ($vel as $hitam) {
                    $total_bayar += $hitam->total_js;
                }
                $user[(int)$koy] = $total_bayar;
            }

            for ($i = 1; $i <= 12; $i++) {
                if (!empty($user[$i])) {
                    $userA[] = $user[$i];
                } else {
                    $userA[] = 0;
                }
            }




            $transfer = transfer::select('tanggal', 'nominal')->whereYear('tanggal', Carbon::now()->format('Y'))->get()->groupBy(function ($daka) {
                return Carbon::parse($daka->tanggal)->format('m');
            });
            $userb = [];
            $userAg = [];

            foreach ($transfer as $kay => $vul) {
                $total_transfer = 0;
                foreach ($vul as $hitam) {
                    $total_transfer += $hitam->nominal;
                }
                $userb[(int)$kay] = $total_transfer;
            }

            for ($i = 1; $i <= 12; $i++) {
                if (!empty($userb[$i])) {
                    $userAg[] = $userb[$i];
                } else {
                    $userAg[] = 0;
                }
            }

            return view('home')->with('tpp', $userArr)->with('topup', $userAr)->with('transaksijs', $userA)->with('transfer', $userAg)->with('customerbar', $customerbar)->with('customertoko', $customertoko);
        }


        // --------------------------------------------------------

        if (auth()->user()->role == "adminppob") {

            $tpp = transaksippob::select('bayar_transaksi_ppob', 'tanggal_transaksi_ppob')->whereYear('tanggal_transaksi_ppob', Carbon::now()->format('Y'))->get()->groupBy(function ($data) {
                return Carbon::parse($data->tanggal_transaksi_ppob)->format('m');
            });
            $usermcount = [];
            $userArr = [];

            foreach ($tpp as $key => $value) {
                $total = 0;
                foreach ($value as $item) {
                    $total += $item->bayar_transaksi_ppob;
                }
                $usermcount[(int)$key] = $total;
            }

            for ($i = 1; $i <= 12; $i++) {
                if (!empty($usermcount[$i])) {
                    $userArr[] = $usermcount[$i];
                } else {
                    $userArr[] = 0;
                }
            }
            return view('home')->with('tpp', $userArr);
        }
        //    --------------------------------------------------------------------------------

        if (auth()->user()->role == "admin") {
            $usser = User::find(auth()->user()->id);
            $customerbar = customer::where('role_customer', 'customer')->where('id_kecamatan_customer', $usser->id_kecamatan_user)->count();
            $customertoko = customer::where('role_customer', 'toko')->where('id_kecamatan_customer', $usser->id_kecamatan_user)->count();

            $topup = topup::select('tanggal_topup', 'nominal_topup')->where('id_kecamatan_topup', $usser->id_kecamatan_user)->whereYear('tanggal_topup', Carbon::now()->format('Y'))->get()->groupBy(function ($dat) {
                return Carbon::parse($dat->tanggal_topup)->format('m');
            });
            $userm = [];
            $userAr = [];

            foreach ($topup as $kiy => $val) {
                $total_topup = 0;
                foreach ($val as $hitem) {
                    $total_topup += $hitem->nominal_topup;
                }
                $userm[(int)$kiy] = $total_topup;
            }

            for ($i = 1; $i <= 12; $i++) {
                if (!empty($userm[$i])) {
                    $userAr[] = $userm[$i];
                } else {
                    $userAr[] = 0;
                }
            }

            $transaksijs = transaksijs::select('created_at', 'total_js')->where('id_kc_js', $usser->id_kecamatan_user)->whereYear('created_at', Carbon::now()->format('Y'))->get()->groupBy(function ($da) {
                return Carbon::parse($da->created_at)->format('m');
            });
            $user = [];
            $userA = [];

            foreach ($transaksijs as $koy => $vel) {
                $total_bayar = 0;
                foreach ($vel as $hitam) {
                    $total_bayar += $hitam->total_js;
                }
                $user[(int)$koy] = $total_bayar;
            }

            for ($i = 1; $i <= 12; $i++) {
                if (!empty($user[$i])) {
                    $userA[] = $user[$i];
                } else {
                    $userA[] = 0;
                }
            }




            $transfer = transfer::select('tanggal', 'nominal')->where('id_kecamatan_transfer', $usser->id_kecamatan_user)->whereYear('tanggal', Carbon::now()->format('Y'))->get()->groupBy(function ($daka) {
                return Carbon::parse($daka->tanggal)->format('m');
            });
            $userb = [];
            $userAg = [];
            // ->where('id_kecamatan_transfer',$user->id_kecamatan_user)
            foreach ($transfer as $kay => $vul) {
                $total_transfer = 0;
                foreach ($vul as $hitam) {
                    $total_transfer += $hitam->nominal;
                }
                $userb[(int)$kay] = $total_transfer;
            }

            for ($i = 1; $i <= 12; $i++) {
                if (!empty($userb[$i])) {
                    $userAg[] = $userb[$i];
                } else {
                    $userAg[] = 0;
                }
            }

            return view('home')->with('topup', $userAr)->with('transaksijs', $userA)->with('transfer', $userAg)->with('customerbar', $customerbar)->with('customertoko', $customertoko);
        }
    }
}
