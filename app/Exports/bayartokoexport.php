<?php

namespace App\Exports;
use App\Models\bayartoko;
use Maatwebsite\Excel\Concerns\FromCollection;

class bayartokoexport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return bayartoko::all();
    }
}
