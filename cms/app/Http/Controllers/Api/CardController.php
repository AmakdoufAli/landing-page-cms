<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Card;

class CardController extends Controller
{
    public function index()
    {
        $cards = Card::all();
        foreach($cards as $card){
            $card->title = json_decode($card->title);
            // $card->description = json_decode($card->description);
        }
        return $cards;
    }

    public function getCardsSection($id)
    {
        $cards = Card::where('id_section', $id)->get();
        foreach($cards as $card){
            $card->title = json_decode($card->title);
            // $card->description = json_decode($card->description);
        }
        return $cards;
    }

}
