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
            'box' => 'garage',
        ];

        $dbType = $typeMap[$type] ?? $type;

        // Build search patterns based on type
        $searchPatterns = [];
        
        if ($dbType === 'store') {
            $searchPatterns = ["Loja {$number}", "Loja 0{$number}", "Loja {$number}"];
        } elseif ($dbType === 'apartment') {
            $searchPatterns = ["Apt {$number}", "Apartamento {$number}", "Apt. {$number}"];
        } elseif ($dbType === 'garage') {
            $searchPatterns = ["Garagem {$number}", "Garagem 0{$number}", "Box {$number}", "Box 0{$number}"];
        }

        $fraction = null;
        
        foreach ($searchPatterns as $pattern) {
            $fraction = Fraction::where('type', $dbType)
                ->where('location', 'like', "%{$pattern}%")
                ->first();
            
            if ($fraction) break;
        }

        // Also try just searching by number in the location
        if (!$fraction) {
            $fraction = Fraction::where('type', $dbType)
                ->where('location', 'like', "%{$number}%")
                ->first();
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
                'percentage' => $fraction->formatted_percentage,
            ],
        ]);
    }
}

