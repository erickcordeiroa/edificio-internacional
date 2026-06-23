<?php

namespace Database\Seeders;

use App\Models\Fraction;
use Illuminate\Database\Seeder;

class ApartmentFractionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fractionsByUnit = [
            1 => '0.549185',
            2 => '0.546616',
            3 => '0.297494',
            4 => '0.297494',
            5 => '0.297494',
            6 => '0.300063',
            7 => '0.150674',
            8 => '0.148533',
            9 => '0.148533',
            10 => '0.148533',
            11 => '0.148533',
            12 => '0.233290',
            13 => '0.546616',
            14 => '0.397655',
            15 => '0.150674',
            16 => '0.148533',
            17 => '0.148533',
            18 => '0.148533',
            19 => '0.148533',
            20 => '0.197334',
        ];

        Fraction::where('type', 'apartment')->delete();

        for ($floor = 1; $floor <= 18; $floor++) {
            foreach ($fractionsByUnit as $unit => $fraction) {
                Fraction::updateOrCreate(
                    [
                        'location' => (string) (($floor * 100) + $unit),
                        'type' => 'apartment',
                    ],
                    [
                        'fraction' => $fraction,
                    ],
                );
            }
        }
    }
}
