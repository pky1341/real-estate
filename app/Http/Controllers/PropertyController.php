<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\PropertyType;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index(Request $request)
    {
        $query = Property::with('propertyType')
            ->where('status', 'available')
            ->orderBy('featured', 'desc')
            ->orderBy('created_at', 'desc');

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('city', 'like', "%{$search}%")
                  ->orWhere('address', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        if ($request->filled('type')) {
            $query->where('property_type_id', $request->type);
        }

        $properties = $query->paginate(9);
        $propertyTypes = PropertyType::all();
        
        return view('properties', compact('properties', 'propertyTypes'));
    }

    public function show($id)
    {
        $property = Property::with('propertyType', 'inquiries')->findOrFail($id);
        $relatedProperties = Property::where('property_type_id', $property->property_type_id)
            ->where('id', '!=', $property->id)
            ->where('status', 'available')
            ->limit(3)
            ->get();
            
        return view('property-details', compact('property', 'relatedProperties'));
    }
}