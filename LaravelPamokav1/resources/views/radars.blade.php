
<table style = "border: 3px solid black">
    <tr>
        <td>Numeris</td>
        <td>Greitis</td>
    </tr>
    @foreach ($radars as $radar)
    <tr>
        <td>{{ $radar->number }}</td>
        <td>{{ $radar->distance / $radar->time }}</td>      
    </tr>
    @endforeach
</table>