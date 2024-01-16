<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\toko;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use Validator;

class CustomerapiController extends Controller
{
    public function index(Request $request)
    {





        $customer = customer::where('id_customer', $request->id_customer)->where('customer_is_delete', 0)->first();
        if ($customer->customer_is_delete == 1) {
            return response()->json([
                'status' => false,
                'msg' => 'User Belum Terdaftar',

            ]);
        }
        if ($customer == null) {
            return response()->json([
                'status' => false,
                'msg' => 'User Not Found',
                'data' => null,
            ]);
        }
        if (!Hash::check($request->pin_customer, $customer->pin_customer, [])) {
            return response()->json([
                'status' => false,
                'msg' => 'password wrong',
                'data' => null,
            ]);
        }

        // $kecamatan = kecamatan::all();
        // $tokenResult = $customer->createToken('token-auth')->plainTextToken;
        return response()->json([
            'status' => 'success',
            'msg' => 'login successfully',
            'data' => $customer,
        ]);
    }

    public function customerget($id)
    {

        $customerget = Customer::where('id_customer', $id)->where('customer_is_delete', 0)->first();
        if ($customerget->customer_is_delete == 1) {
            return response()->json([
                'status' => false,
                'msg' => 'User belum terdaftar',
                'data' => null,
            ]);
        }
        if ($customerget == null) {
            return response()->json([
                'status' => false,
                'msg' => 'User Not Found',
                'data' => null,
            ]);
        }
        return response()->json([
            'status' => 'success',
            'msg' => 'data customer',
            'data' => $customerget,
        ]);
    }
}
