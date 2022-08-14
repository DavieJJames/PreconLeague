<br/>
@foreach ($data->Matches as $match)
    <table>
        <tr>
            <td>{{ $match->Date }}</td>
        </tr>
        <tr>
            <td>
                @foreach ($match->Players as $player)
                    <div>{{ $player->Name }}</div>
                    <div>{{ $player->DeckName }}</div>
                @endforeach
            </td>
        </tr>
    </table>
    <br/>
@endforeach
