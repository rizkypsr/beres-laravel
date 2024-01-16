<?php

namespace App\Exports;

use App\Models\Customer;
use App\Models\kota;
use Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;

class KecamatanExport implements FromCollection, WithHeadings, ShouldAutoSize, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function headings(): array
    {
        return [
            'Id',
            'Kota',
            'Kecamatan',
        ];
    }
    public function collection()
    {
        return kota::with('kecamatan')->get();
    }

    public function map($cust): array
    {
        return [
            $cust->kecamatan->id_kecamatan,
            $cust->nama_kota,
            $cust->kecamatan->nama_kecamatan,
        ];
    }
}
