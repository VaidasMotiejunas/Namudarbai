@if (!is_null($radar))
    <table style="border: 3px solid black; font-size: 58px; text-align: center;">
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
    <h1>Tokio įrašo nėra</h1>
@endif