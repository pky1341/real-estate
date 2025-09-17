<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    public function show($page)
    {
        $allowedPages = ['home', 'properties', 'about', 'services', 'contact'];
        
        if (!in_array($page, $allowedPages)) {
            abort(404);
        }
        
        return view($page);
    }
}