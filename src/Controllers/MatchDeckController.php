<?php

namespace DavieJJ\PreconLeague\Controllers;

use App\Http\Controllers\Controller,
    Illuminate\Support\Facades\Storage,
    DavieJJ\PreconLeague\Controllers\ScryfallController;

class MatchDeckController extends Controller
{
    public static function GetCommanderCard($commanderJSON)
    {
        $commanderArray = json_decode($commanderJSON);

        $commanderCards = [];
        foreach($commanderArray as $commander)
        {
            list($setCode, $cardNumber) = explode(':', $commander);
            $commanderCards[$commander] = ScryfallController::GetCard($setCode, $cardNumber);

            $cardArtURL = 'public/cache/card_art/'.$setCode.'_'.$cardNumber.'.jpg';

            if(!Storage::get($cardArtURL))
            {
                Storage::put($cardArtURL, file_get_contents($commanderCards[$commander]->image_uris->art_crop));
            }

            $commanderCards[$commander]->cardArtURL = '/cache/img/card_art/'.$setCode.'_'.$cardNumber;
        }

        return $commanderCards;
    }
}
