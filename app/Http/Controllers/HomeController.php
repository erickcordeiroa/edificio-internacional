<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $featuredProperties = Property::with('photos')
            ->active()
            ->featured()
            ->latest()
            ->limit(6)
            ->get();

        $latestProperties = Property::with('photos')
            ->active()
            ->latest()
            ->limit(8)
            ->get();

        $propertiesForSale = Property::active()->forSale()->count();
        $propertiesForRent = Property::active()->forRent()->count();

        return view('home', compact(
            'featuredProperties',
            'latestProperties',
            'propertiesForSale',
            'propertiesForRent'
        ));
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }
}
