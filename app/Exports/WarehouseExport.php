<?php

namespace App\Exports;

use App\Warehouse;
use Maatwebsite\Excel\Concerns\FromCollection;

class WarehouseExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Warehouse::all();
    }
}
