<table style="border: 3px solid black; font-size: 58px; text-align: center;">
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