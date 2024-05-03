<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Section;

class SectionController extends Controller
{
    public function index()
    {
        $sections = Section::all();
        foreach($sections as $section){
            $section->title = json_decode($section->title);
            $section->subtitle1 = json_decode($section->subtitle1);
            $section->subtitle2 = json_decode($section->subtitle2);
            $section->description = json_decode($section->description);
        }
        return $sections;
    }

    public function getSectionLp($id)
    {
        $sections = Section::where('id_landing_page', $id)->get();
        foreach($sections as $section){
            $section->title = json_decode($section->title);
            $section->subtitle1 = json_decode($section->subtitle1);
            $section->subtitle2 = json_decode($section->subtitle2);
            $section->description = json_decode($section->description);
        }
        return $sections;
    }

}
