<?php

namespace DavieJJ\PreconLeague\Controllers;

use App\Http\Controllers\Controller,
    Illuminate\Support\Facades\DB,
    DavieJJ\PreconLeague\Controllers\MatchDeckController;

class TournamentController extends Controller
{
    public function show()
    {
        $data = new \StdClass();

        $sql = 'SELECT m.ID as MatchID, m.DateAdded as MatchDate, p.ID as PlayerID, p.Name as PlayerName,
                    d.ID as DeckID, d.Name as DeckName, md.Commander, md.Position
                FROM tournament t
                INNER JOIN `match` m ON m.TournamentID = t.ID
                INNER JOIN matchdeck md ON md.MatchID = m.ID
                INNER JOIN `deck` d ON d.ID = md.DeckID
                INNER JOIN `player` p ON p.ID = d.PlayerID
                WHERE t.ID IN (SELECT ID FROM tournament ORDER BY ID DESC LIMIT 1)';

        $data->Matches = [];
        foreach(DB::select($sql) as $match)
        {
            if(!isset($data->Matches[$match->MatchID]))
            {
                $data->Matches[$match->MatchID] = new \StdClass();
                $data->Matches[$match->MatchID]->Date = date('d/m/Y',strtotime($match->MatchDate));
                $data->Matches[$match->MatchID]->Players = [];
            }

            $data->Matches[$match->MatchID]->Players[$match->Position] = new \stdClass();
            $data->Matches[$match->MatchID]->Players[$match->Position]->Name = $match->PlayerName;
            $data->Matches[$match->MatchID]->Players[$match->Position]->DeckID = $match->DeckID;
            $data->Matches[$match->MatchID]->Players[$match->Position]->DeckName = $match->DeckName;
            $data->Matches[$match->MatchID]->Players[$match->Position]->Commanders = MatchDeckController::GetCommanderCard($match->Commander);
        }

        return view('PreconLeagueViews::default', ['content' => 'matchlist', 'data' => $data]);
    }
}
