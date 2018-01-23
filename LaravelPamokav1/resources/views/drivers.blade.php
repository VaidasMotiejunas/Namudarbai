
<table style = "border: 3px solid black">
    <tr>
        <td>Vardas Pavarde</td>
        <td>Miestas</td>
    </tr>
    @foreach ($drivers as $driver)
    <tr>
        <td>{{ $driver->name }}</td>
        <td>{{ $driver->city }}</td>      
    </tr>
    @endforeach
</table>