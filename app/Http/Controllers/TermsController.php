<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;

class TermsController extends Controller
{
    public function terms(){
        SEOMeta::setTitle("Terms Of Service");
        SEOMeta::setRobots("index, follow");
        SEOMeta::addMeta("apple-mobile-web-app-title", "Trade Fountain");
        SEOMeta::addMeta("application-name", "Trade Fountain");


        OpenGraph::setTitle("Terms Of Service");
        OpenGraph::addProperty("type", "website");
        OpenGraph::addProperty("locale", "eu");

        TwitterCard::setTitle("Terms Of Service");
        TwitterCard::setSite('@tradefountainuk');
        JsonLd::setTitle("Terms Of Service");
        JsonLd::setType("WebSite");
        return view('terms-of-service');
    }

    public function policy(){
        SEOMeta::setTitle("Privacy Policy");
        SEOMeta::setRobots("index, follow");
        SEOMeta::addMeta("apple-mobile-web-app-title", "Trade Fountain");
        SEOMeta::addMeta("application-name", "Trade Fountain");


        OpenGraph::setTitle("Privacy Policy");
        OpenGraph::addProperty("type", "website");
        OpenGraph::addProperty("locale", "eu");

        TwitterCard::setTitle("Privacy Policy");
        TwitterCard::setSite('@tradefountainuk');
        JsonLd::setTitle("Privacy Policy");
        JsonLd::setType("WebSite");
        return view('privacy-policy');
    }
}
