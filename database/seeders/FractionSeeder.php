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
        $stores = [
            ['location' => '01', 'fraction' => '0.432326'],
            ['location' => '02', 'fraction' => '0.251263'],
            ['location' => '03', 'fraction' => '0.176782'],
            ['location' => '04', 'fraction' => '0.145964'],
            ['location' => '05', 'fraction' => '0.129266'],
            ['location' => '06', 'fraction' => '0.127125'],
            ['location' => '07', 'fraction' => '0.127981'],
            ['location' => '08', 'fraction' => '0.127981'],
            ['location' => '09', 'fraction' => '0.425475'],
            ['location' => '10', 'fraction' => '0.426492'],
            ['location' => '11', 'fraction' => '0.172500'],
            ['location' => '12', 'fraction' => '0.172500'],
            ['location' => '13', 'fraction' => '0.341157'],
            ['location' => '14', 'fraction' => '0.338588'],
            ['location' => '15', 'fraction' => '0.130550'],
            ['location' => '16', 'fraction' => '0.230292'],
            ['location' => '17', 'fraction' => '0.180207'],
            ['location' => '18', 'fraction' => '0.214879'],
            ['location' => '19', 'fraction' => '0.107011'],
            ['location' => '20', 'fraction' => '0.128409'],
            ['location' => '21', 'fraction' => '0.098876'],
            ['location' => '22', 'fraction' => '0.204174'],
        ];

        Fraction::where('type', 'store')
            ->where('location', 'like', 'Loja %')
            ->delete();

        foreach ($stores as $store) {
            Fraction::updateOrCreate(
                [
                    'location' => $store['location'],
                    'type' => 'store',
                ],
                [
                    'fraction' => $store['fraction'],
                ],
            );
        }

        $boxes = [
            ['location' => '01', 'fraction' => '0.066345'],
            ['location' => '02', 'fraction' => '0.066345'],
            ['location' => '03', 'fraction' => '0.067202'],
            ['location' => '04', 'fraction' => '0.067202'],
            ['location' => '05', 'fraction' => '0.067202'],
            ['location' => '06', 'fraction' => '0.067202'],
            ['location' => '07', 'fraction' => '0.067202'],
            ['location' => '08', 'fraction' => '0.067202'],
            ['location' => '09', 'fraction' => '0.067202'],
            ['location' => '10', 'fraction' => '0.067202'],
            ['location' => '11', 'fraction' => '0.067202'],
            ['location' => '12', 'fraction' => '0.067202'],
            ['location' => '13', 'fraction' => '0.067202'],
            ['location' => '14', 'fraction' => '0.067202'],
            ['location' => '15', 'fraction' => '0.054785'],
            ['location' => '16', 'fraction' => '0.055213'],
            ['location' => '17', 'fraction' => '0.055213'],
            ['location' => '18', 'fraction' => '0.055213'],
            ['location' => '19', 'fraction' => '0.055213'],
            ['location' => '20', 'fraction' => '0.055213'],
            ['location' => '21', 'fraction' => '0.055213'],
            ['location' => '22', 'fraction' => '0.055213'],
            ['location' => '23', 'fraction' => '0.055213'],
            ['location' => '24', 'fraction' => '0.055213'],
            ['location' => '25', 'fraction' => '0.055213'],
            ['location' => '26', 'fraction' => '0.063348'],
            ['location' => '27', 'fraction' => '0.063348'],
            ['location' => '28', 'fraction' => '0.063348'],
            ['location' => '29', 'fraction' => '0.063348'],
            ['location' => '30', 'fraction' => '0.063348'],
            ['location' => '31', 'fraction' => '0.063348'],
            ['location' => '32', 'fraction' => '0.063348'],
            ['location' => '33', 'fraction' => '0.063348'],
            ['location' => '34', 'fraction' => '0.063348'],
            ['location' => '35', 'fraction' => '0.063348'],
            ['location' => '36', 'fraction' => '0.063348'],
            ['location' => '37', 'fraction' => '0.063348'],
            ['location' => '38', 'fraction' => '0.063348'],
            ['location' => '39', 'fraction' => '0.063348'],
            ['location' => '40', 'fraction' => '0.063348'],
            ['location' => '41', 'fraction' => '0.063348'],
        ];

        foreach ($boxes as $box) {
            Fraction::updateOrCreate(
                [
                    'location' => $box['location'],
                    'type' => 'box',
                ],
                [
                    'fraction' => $box['fraction'],
                ],
            );
        }
    }
}

