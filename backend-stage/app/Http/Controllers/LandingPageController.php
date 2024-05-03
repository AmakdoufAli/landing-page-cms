<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\LandingPage;
use App\Models\Section;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $landingPages = LandingPage::all()->map(function ($landingPage) {
            $landingPage->title = json_decode($landingPage->title, true);
            $landingPage->description = json_decode($landingPage->description, true);
            return $landingPage;
        });

        return $landingPages;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return LandingPage::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return LandingPage::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('pages.manage_lp', compact('id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $LandingPage = LandingPage::findOrFail($id);
        $LandingPage->update($request->all());
        return $LandingPage;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sections = Section::where('id_landing_page', $id)->get();

        foreach ($sections as $section) {

            $cards = Card::where('id_section', $section->id)->get();

            foreach ($cards as $card) {
                Card::destroy($card->id);
            }

            Section::destroy($section->id);

        }

        LandingPage::destroy($id);

        return response()->json(null, 204);
    }
}
