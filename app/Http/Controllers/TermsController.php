<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TermsController extends Controller
{
    public function terms(){
        return view('terms-of-service');
    }

    public function policy(){
        return view('privacy-policy');
    }
}
