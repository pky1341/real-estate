<?php

namespace App\Http\Controllers;

use App\Models\Property;

class PageController extends Controller
{
    public function show($page)
    {
        $allowedPages = ['home', 'about', 'services', 'contact'];
        
        if (!in_array($page, $allowedPages)) {
            abort(404);
        }
        
        $data = [];
        
        if ($page === 'home') {
            $data['featuredProperties'] = Property::where('featured', true)
                ->where('status', 'available')
                ->with('propertyType')
                ->limit(6)
                ->get();
        }
        
        return view($page, $data);
    }
}