<?php

namespace App\Exports;
use App\Models\transaksijs;

use Maatwebsite\Excel\Concerns\FromCollection;

class transaksijsexport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return transaksijs::all();
    }
}
