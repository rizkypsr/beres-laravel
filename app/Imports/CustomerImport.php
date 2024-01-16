<?php

namespace App\Imports;

use App\Models\Customer;
use App\Models\kecamatan;
use DateTime;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class CustomerImport implements ToModel, WithHeadingRow, WithValidation
{
    use Importable;

    public function model(array $row)
    {

        $unixTimestamp = ($row['tgl_lahir'] - 25569) * 86400;
        $formattedDate = date('Y-m-d', $unixTimestamp);

        $cus = new Customer([
            'id_customer' => $row['id'],
            'id_kecamatan_customer' => $row['kecamatan'],
            'nama' => $row['nama'],
            'alamat_customer' => $row['alamat'],
            'saldo_customer' => $row['saldo'],
            'pin_customer' => Hash::make($row['pin']),
            'no_hp_customer' => $row['no_hp'],
            'role_customer' => 'customer',
            'tempat_lahir' => $row['tempat_lahir'],
            'tgl_lahir' => $formattedDate,
        ]);


        return $cus;
    }

    public function rules(): array
    {
        return [
            'id' => 'required|unique:customer,id_customer',
            'kecamatan' => 'required|exists:kecamatan,id_kecamatan',
            'nama' => 'required',
            'alamat' => 'required',
            'saldo' => 'required',
            'pin' => 'required',
            'no_hp' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
        ];
    }

    public function customValidationMessages()
    {
        return [
            'id.unique' => 'ID Customer sudah ada',
            'kecamatan.exists' => 'ID Kecamatan tidak ada',
            'kecamatan.required' => 'ID Kecamatan tidak boleh kosong',
            'nama.required' => 'Nama tidak boleh kosong',
            'alamat.required' => 'Alamat tidak boleh kosong',
            'saldo.required' => 'Saldo tidak boleh kosong',
            'pin.required' => 'Pin tidak boleh kosong',
            'no_hp.required' => 'No HP tidak boleh kosong',
            'tempat_lahir.required' => 'Tempat Lahir tidak boleh kosong',
            'tgl_lahir.required' => 'Tanggal Lahir tidak boleh kosong',
        ];
    }
}
