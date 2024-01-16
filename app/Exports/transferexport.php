<?php

namespace App\Exports;
use App\Models\transfer;

use Maatwebsite\Excel\Concerns\FromCollection;

class transferexport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return transfer::all();
    }
}
