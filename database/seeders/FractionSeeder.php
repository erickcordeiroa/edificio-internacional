<?php

namespace Database\Seeders;

use App\Models\Fraction;
use Illuminate\Database\Seeder;

class FractionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fractions = [
            // Apartamentos
            ['location' => 'Apt 101', 'fraction' => 0.025000, 'type' => 'apartment'],
            ['location' => 'Apt 102', 'fraction' => 0.025000, 'type' => 'apartment'],
            ['location' => 'Apt 103', 'fraction' => 0.030000, 'type' => 'apartment'],
            ['location' => 'Apt 201', 'fraction' => 0.025000, 'type' => 'apartment'],
            ['location' => 'Apt 202', 'fraction' => 0.025000, 'type' => 'apartment'],
            ['location' => 'Apt 203', 'fraction' => 0.030000, 'type' => 'apartment'],
            ['location' => 'Apt 301', 'fraction' => 0.028000, 'type' => 'apartment'],
            ['location' => 'Apt 302', 'fraction' => 0.028000, 'type' => 'apartment'],
            ['location' => 'Apt 303', 'fraction' => 0.032000, 'type' => 'apartment'],
            ['location' => 'Apt 401', 'fraction' => 0.028000, 'type' => 'apartment'],
            ['location' => 'Apt 402', 'fraction' => 0.028000, 'type' => 'apartment'],
            ['location' => 'Apt 403', 'fraction' => 0.032000, 'type' => 'apartment'],
            ['location' => 'Apt 501 (Cobertura)', 'fraction' => 0.045000, 'type' => 'apartment'],
            ['location' => 'Apt 502 (Cobertura)', 'fraction' => 0.045000, 'type' => 'apartment'],
            
            // Lojas
            ['location' => 'Loja 01', 'fraction' => 0.050000, 'type' => 'store'],
            ['location' => 'Loja 02', 'fraction' => 0.045000, 'type' => 'store'],
            ['location' => 'Loja 03', 'fraction' => 0.040000, 'type' => 'store'],
            
            // Garagens
            ['location' => 'Garagem 01', 'fraction' => 0.008000, 'type' => 'garage'],
            ['location' => 'Garagem 02', 'fraction' => 0.008000, 'type' => 'garage'],
            ['location' => 'Garagem 03', 'fraction' => 0.008000, 'type' => 'garage'],
            ['location' => 'Garagem 04', 'fraction' => 0.008000, 'type' => 'garage'],
            ['location' => 'Garagem 05', 'fraction' => 0.008000, 'type' => 'garage'],
            ['location' => 'Garagem 06', 'fraction' => 0.008000, 'type' => 'garage'],
            ['location' => 'Garagem 07', 'fraction' => 0.008000, 'type' => 'garage'],
            ['location' => 'Garagem 08', 'fraction' => 0.008000, 'type' => 'garage'],
            ['location' => 'Garagem 09', 'fraction' => 0.008000, 'type' => 'garage'],
            ['location' => 'Garagem 10', 'fraction' => 0.008000, 'type' => 'garage'],
            
            // Salas comerciais
            ['location' => 'Sala 101', 'fraction' => 0.020000, 'type' => 'office'],
            ['location' => 'Sala 102', 'fraction' => 0.020000, 'type' => 'office'],
            ['location' => 'Sala 103', 'fraction' => 0.018000, 'type' => 'office'],
            
            // Depósitos
            ['location' => 'Depósito 01', 'fraction' => 0.005000, 'type' => 'storage'],
            ['location' => 'Depósito 02', 'fraction' => 0.005000, 'type' => 'storage'],
            ['location' => 'Depósito 03', 'fraction' => 0.005000, 'type' => 'storage'],
            ['location' => 'Depósito 04', 'fraction' => 0.005000, 'type' => 'storage'],
        ];

        foreach ($fractions as $fractionData) {
            Fraction::firstOrCreate(
                ['location' => $fractionData['location']],
                $fractionData
            );
        }
    }
}

