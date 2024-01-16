<?php

namespace App\Exports;

use App\Models\Customer;
use Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class customerexport implements FromCollection, WithHeadings, ShouldAutoSize, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function headings(): array
    {
        return [
            'Id',
            'Kecamatan',
            'Nama Customer',
            'Alamat',
            'Saldo',
            'Pin',
            'No Handphone',
            'Role',
            'Tempat Lahir',
            'Tanggal Lahir',
        ];
    }
    public function collection()
    {
        if (Auth::user()->role == 'superadmin') {
            return Customer::where('role_customer', 'customer')->with('kecamatan')->get();
        }
        if (Auth::user()->role == 'admin') {
            return Customer::where('role_customer', 'customer')
                ->where('id_kecamatan_customer', Auth::user()->id_kecamatan_user)
                ->with('kecamatan')->get();
        }
    }

    public function map($cust): array
    {
        return [
            $cust->id_customer,
            $cust->kecamatan->nama_kecamatan,
            $cust->nama,
            $cust->alamat_customer,
            $cust->saldo_customer,
            $cust->pin_customer,
            $cust->no_hp_customer,
            $cust->role_customer,
            $cust->tempat_lahir,
            $cust->tgl_lahir,
        ];
    }
}
