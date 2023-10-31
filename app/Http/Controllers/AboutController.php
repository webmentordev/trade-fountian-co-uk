<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;

class AboutController extends Controller
{
    public function index(){
        SEOMeta::setTitle("About Trade Fountain");
        SEOMeta::setDescription("Read information about Trade Fountain / Dujana LTD, trade fountain amazon store and customer reviews.");
        SEOMeta::setRobots("index, follow");
        SEOMeta::addMeta("apple-mobile-web-app-title", "Trade Fountain");
        SEOMeta::addMeta("application-name", "Trade Fountain");


        OpenGraph::setTitle("About Trade Fountain");
        OpenGraph::setDescription("Read information about Trade Fountain / Dujana LTD, trade fountain amazon store and customer reviews");
        OpenGraph::addProperty("type", "website");
        OpenGraph::addProperty("locale", "eu");

        TwitterCard::setTitle("About Trade Fountain");
        TwitterCard::setSite('@tradefountainuk');

        JsonLd::setTitle("About Trade Fountain");
        JsonLd::setDescription("Read information about Trade Fountain / Dujana LTD, trade fountain amazon store and customer reviews");
        JsonLd::setType("WebSite");
        return view('about', [
            'reviews' => Review::latest()->limit(20)->get()
        ]);
    }
}
