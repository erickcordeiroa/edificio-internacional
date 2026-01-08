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

        if ($request->has('search')) {
            $query->whereLike('title', "%{$request->search}%");
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
