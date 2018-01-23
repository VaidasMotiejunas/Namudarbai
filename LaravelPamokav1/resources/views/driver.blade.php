@if (!is_null($driver))
<table style = "border: 3px solid black">
    <tr>
        <td>Vardar Pavarde</td>
        <td>Miestas</td>
    </tr>
    <tr>
        <td>{{ $driver->name }}</td>
        <td>{{ $driver->city }}</td>      
    </tr>
</table>
@else
    <h1>Tokio iraso nera</h1>
@endif