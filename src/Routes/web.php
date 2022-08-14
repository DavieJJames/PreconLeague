<?php

use Illuminate\Support\Facades\Route,
    DavieJJ\PreconLeague\Controllers\MatchController,
    DavieJJ\PreconLeague\Controllers\TournamentController;

Route::get('/',
    [TournamentController::class, 'show']
);
Route::get( '/match/{matchID}',
    [MatchController::class, 'show']
);
