<br/>
@foreach ($data->Matches as $matchID => $match)
    <table>
        <tr>
            <td><a href="/match/{{ $matchID }}">{{ $match->Date }}</a></td>
        </tr>
        <tr>
            <td>
                @foreach ($match->Players as $player)
                    <div>{{ $player->Name }}</div>
                    <div>{{ $player->DeckName }}</div>
                    @foreach ($player->Commanders as $commander)
                        <img src="{{ $commander->cardArtURL }}"/>
                    @endforeach
                @endforeach
            </td>
        </tr>
    </table>
    <br/>
@endforeach
