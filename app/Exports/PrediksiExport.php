<?php

namespace App\Exports;

use App\Models\Prediksi;
use Maatwebsite\Excel\Concerns\FromCollection;

class PrediksiExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Prediksi::all();
    }
}
