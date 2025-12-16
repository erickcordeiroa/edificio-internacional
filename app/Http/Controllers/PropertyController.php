<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index(Request $request)
    {
        $query = Property::with('photos')->active();

        // Filtrar por tipo de transação
        if ($request->has('transaction') && in_array($request->transaction, ['SALE', 'RENT'])) {
            $query->where('type', $request->transaction);
        }

        // Filtrar por localização
        if ($request->has('location') && $request->location) {
            $query->where('location', 'like', '%' . $request->location . '%');
        }

        // Filtrar por preço mínimo
        if ($request->has('min_price') && $request->min_price) {
            $query->where('price', '>=', (float) $request->min_price);
        }

        // Filtrar por preço máximo
        if ($request->has('max_price') && $request->max_price) {
            $query->where('price', '<=', (float) $request->max_price);
        }

        $properties = $query->latest()->paginate(12);

        return view('properties.index', compact('properties'));
    }

    public function show(string $slug)
    {
        $property = Property::with('photos')
            ->where('slug', $slug)
            ->active()
            ->firstOrFail();

        $relatedProperties = Property::with('photos')
            ->active()
            ->where('id', '!=', $property->id)
            ->where('type', $property->type)
            ->limit(3)
            ->get();

        return view('properties.show', compact('property', 'relatedProperties'));
    }
}
