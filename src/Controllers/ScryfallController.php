<?php

namespace DavieJJ\PreconLeague\Controllers;

use App\Http\Controllers\Controller;

class ScryfallController extends Controller
{
    public static function GetCard($setCode, $cardNumber)
    {
        return json_decode(file_get_contents('https://api.scryfall.com/cards/'.$setCode.'/'.$cardNumber));
    }
}
