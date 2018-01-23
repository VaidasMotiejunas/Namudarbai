@if (!is_Null($radar))
<table style = "border: 3px solid black">
    <tr>
        <td>Numeris</td>
        <td>Greitis</td>
    </tr>
    <tr>
        <td>{{ $radar->number }}</td>
        <td>{{ $radar->distance / $radar->time }}</td>      
    </tr>
</table>
@else
    <h1>Tokio iraso nera</h1>
@endif