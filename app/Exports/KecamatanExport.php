<?php

namespace App\Exports;

use App\Models\kecamatan;
use App\Models\kota;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
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
            'Kecamatan',
            'Kota',
        ];
    }
    public function collection()
    {
        return kecamatan::with('kota')->orderBy('id_kota_kecamatan')->get();
    }

    public function map($k): array
    {
        return [
            $k->id_kecamatan,
            $k->nama_kecamatan,
            $k->kota->nama_kota,
        ];
    }
}
