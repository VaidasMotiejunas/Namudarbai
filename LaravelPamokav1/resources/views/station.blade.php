@if (!is_Null($station))
<table style = "border: 3px solid black">
    <tr>
        <td>Miestas</td>
        <td>Adresas</td>
        <td>Dujos, l</td>
        <td>Dyzelis, l</td>
        <td>Benzinas, l</td>
    </tr>
    <tr>
        <td>{{ $station->miestas }}</td>
        <td>{{ $station->adresas }}</td>   
        <td>{{ $station->gas }}</td>   
        <td>{{ $station->dysel }}</td>   
        <td>{{ $station->gasoline }}</td>    
    </tr>
</table>
@else
    <h1>Tokio iraso nera</h1>
@endif