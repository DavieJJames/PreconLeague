<br/>
@foreach ($data->MatchDecks as $matchDeck)
    <table>
        <tr>
            <td>{{ $matchDeck->PlayerName }}</td>
            <td>{{ $matchDeck->Position }}</td>
        </tr>
        <tr>
            <td colspan="2">{{ $matchDeck->DeckName }}</td>
        </tr>
    </table>
    <br/>
@endforeach
