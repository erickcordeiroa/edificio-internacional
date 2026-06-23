<?php

namespace App\Http\Controllers;

use App\Models\Fraction;
use Illuminate\Http\Request;

class FractionController extends Controller
{
    public function simulator()
    {
        $fractions = Fraction::orderBy('type')->orderBy('location')->get();

        $groupedFractions = $fractions->groupBy('type');

        $totalFraction = Fraction::getTotalFraction();

        return view('fractions.simulator', compact('fractions', 'groupedFractions', 'totalFraction'));
    }

    public function calculate(Request $request)
    {
        $request->validate([
            'total_value' => 'required|numeric|min:0',
        ]);

        $totalValue = (float) $request->total_value;
        $fractions = Fraction::orderBy('type')->orderBy('location')->get();

        $results = $fractions->map(function ($fraction) use ($totalValue) {
            return [
                'id' => $fraction->id,
                'location' => $fraction->location,
                'type' => $fraction->type,
                'type_label' => $fraction->type_label,
                'fraction' => $fraction->fraction,
                'percentage' => $fraction->formatted_percentage,
                'calculated_value' => $fraction->calculateValue($totalValue),
                'formatted_value' => $fraction->getFormattedValue($totalValue),
            ];
        });

        $groupedResults = $results->groupBy('type');

        return response()->json([
            'success' => true,
            'total_value' => $totalValue,
            'formatted_total' => 'R$ ' . number_format($totalValue, 2, ',', '.'),
            'results' => $results,
            'grouped_results' => $groupedResults,
        ]);
    }

    public function findFraction(Request $request)
    {
        $request->validate([
            'type' => 'required|string',
            'number' => 'required|string',
        ]);

        $type = $request->type;
        $number = $request->number;

        // Map type to database type
        $typeMap = [
            'loja' => 'store',
            'apartamento' => 'apartment',
            'box' => 'box',
        ];

        $dbType = $typeMap[$type] ?? $type;

        $normalizedNumber = str_pad((string) (int) $number, 2, '0', STR_PAD_LEFT);

        $fraction = Fraction::where('type', $dbType)
            ->whereIn('location', [$normalizedNumber, $number])
            ->first();

        if (!$fraction && $dbType === 'apartment') {
            $searchPatterns = ["Apt {$number}", "Apartamento {$number}", "Apt. {$number}"];

            foreach ($searchPatterns as $pattern) {
                $fraction = Fraction::where('type', $dbType)
                    ->where('location', 'like', "%{$pattern}%")
                    ->first();

                if ($fraction)
                    break;
            }
        }

        if (!$fraction) {
            return response()->json([
                'success' => false,
                'message' => 'Fração não encontrada para este imóvel.',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'fraction' => [
                'id' => $fraction->id,
                'location' => $fraction->location,
                'type' => $fraction->type,
                'type_label' => $fraction->type_label,
                'fraction' => (float) $fraction->fraction,
                'calculation_multiplier' => $fraction->calculation_multiplier,
                'percentage' => $fraction->formatted_percentage,
            ],
        ]);
    }
}

