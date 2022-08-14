<?php

namespace DavieJJ\PreconLeague\Controllers;

use App\Http\Controllers\Controller,
    Illuminate\Support\Facades\DB;

class MatchController extends Controller
{
    public function show()
    {
        $data = new \StdClass();
        $data->MatchID = request()->matchID;

        $sql = 'SELECT m.DateAdded as MatchDate, p.Name as PlayerName, d.Name as DeckName, md.Position
                FROM `matchdeck` md
                INNER JOIN `match` m on m.ID = md.MatchID
                INNER JOIN `deck` d ON d.ID = md.DeckID
                INNER JOIN `player` p ON p.ID = d.PlayerID
                WHERE MatchID = :matchId
                ORDER BY md.Position';

        $data->MatchDecks = DB::select($sql, ['matchId' => $data->MatchID]) as $match);

        return view('PreconLeagueViews::default', ['content' => 'match', 'data' => $data]);
    }
}
