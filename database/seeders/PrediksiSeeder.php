<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PrediksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('prediksis')->insert([
            'gender' => 'female',
            'age' => '22',
            'hypertension' => '20',
            'heart_disease' => '20',
            'ever_married' => 'YES',
            'avg_gluose_level' => '20',
            'bmi' => '20',
            'smoking_status' => 'smokes',
            'stroke' => '0'
        ]);
    }
}
