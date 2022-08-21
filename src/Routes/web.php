<?php

use Illuminate\Support\Facades\Route,
    Illuminate\Support\Facades\Storage,
    DavieJJ\PreconLeague\Controllers\MatchController,
    DavieJJ\PreconLeague\Controllers\TournamentController;

Route::get('/',
    [TournamentController::class, 'show']
);
Route::get( '/match/{matchID}',
    [MatchController::class, 'show']
);

Route::get('/cache/img/card_art/{cardName}', function($cardName) {
    return response(
        Storage::get('/public/cache/card_art/'.$cardName.'.jpg')
    )->header('Content-Type', 'image/jpeg');
});
