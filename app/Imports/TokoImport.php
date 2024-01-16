<?php

namespace App\Imports;

use App\Models\Customer;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class TokoImport implements ToModel, WithHeadingRow, WithValidation
{

    public function model(array $row)
    {
        $unixTimestamp = ($row['tgl_lahir'] - 25569) * 86400;
        $formattedDate = date('Y-m-d', $unixTimestamp);

        // The $row variable contains column names as keys and data as values
        return new Customer([
            'id_customer' => $row['id'],
            'id_kecamatan_customer' => $row['kecamatan'],
            'nama' => $row['nama'],
            'alamat_customer' => $row['alamat'],
            'saldo_customer' => $row['saldo'],
            'pin_customer' => Hash::make($row['pin']),
            'no_hp_customer' => $row['no_hp'],
            'role_customer' => 'toko',
            'tempat_lahir' => $row['tempat_lahir'],
            'tgl_lahir' => $formattedDate,
        ]);
    }

    public function rules(): array
    {
        return [
            // 'tgl_lahir' => 'date_format:Y-m-d',
            'id_customer' => 'unique:customer,id_customer',
            'id_kecamatan_customer' => 'exists:kecamatan,id_kecamatan',
        ];
    }

    public function customValidationMessages()
    {
        return [
            // 'tgl_lahir.date_format' => 'The :attribute must be a valid date in the format Y-m-d',
            'id_customer.unique' => 'ID Customer sudah ada',
        ];
    }
}
