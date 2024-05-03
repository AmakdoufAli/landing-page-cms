<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\LandingPage;

class LandingPageController extends Controller
{
    public function index()
    {
        $landing_pages = LandingPage::where('etat', 1)->orderBy('id')->get();
        foreach($landing_pages as $landing_page){
            $landing_page->title = json_decode($landing_page->title);
            $landing_page->description = json_decode($landing_page->description);
        }
        return $landing_pages;
    }

    public function show($id)
    {
        return LandingPage::findOrFail($id);
    }

}
