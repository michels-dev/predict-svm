<?php

namespace App\Imports;

use App\Models\Prediksi;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PrediksiImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Prediksi([
            'gender' => $row['gender'],
            'age' => $row['age'],
            'hypertension' => $row['hypertension'],
            'heart_disease' => $row['heart_disease'],
            'ever_married' => $row['ever_married'],
            'avg_gluose_level' => $row['avg_gluose_level'],
            'bmi' => $row['bmi'],
            'smoking_status' => $row['smoking_status'],
            'stroke' => $row['stroke'],

        ]);
    }
}
