<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SiteMapController extends Controller
{
    public function index() {
        return response()->view('sitemap', [
            'products' => Product::all(),
        ])->header('Content-Type', 'text/xml');
    }
}