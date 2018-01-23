
<table style = "border: 3px solid black">
    <tr>
        <td>Miestas</td>
        <td>Adresas</td>
        <td>Dujos, l</td>
        <td>Dyzelis, l</td>
        <td>Benzinas, l</td>
    </tr>
    @foreach ($stations as $station)
    <tr>
        <td>{{ $station->miestas }}</td>
        <td>{{ $station->adresas }}</td>   
        <td>{{ $station->gas }}</td>   
        <td>{{ $station->dysel }}</td>   
        <td>{{ $station->gasoline }}</td>   
    </tr>
    @endforeach
</table>