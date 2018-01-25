
@extends('layouts.layout')

@section('content')

<table class="table tble-stripped table-dark">
    <tr>
        <th>Data</td>
        <th>Numeris</td>
        <th>Greitis</td>
        <th>Vardas</td>
        <th>Miestas</td>
        <th colspan="2" style="text-align:center" >Veiksmai</td>
    </tr>
    <tr>
        <td>{{ $radar->date }}</td>
        <td>{{ $radar->number }}</td>
        <td>{{ $radar->distance / $radar->time }}</td>
        @if($radar->driver)
        <td>{{ $radar->driver->name }}</td>
        <td>{{ $radar->driver->city }}</td>
        @else
        <td>Nepriskirtas</td>
        <td>Nepriskirtas</td>
        @endif
        @if($radar->trashed())
        <td>
            <form action="{{ route('radars.restore', ['radar' => $radar->id] )}}" method="POST">
            {{ csrf_field() }}
                <input class="btn btn-outline-warning" type="submit" value="Atstatyti"></input>
            </form>
        </td>
        @else
        <td><a class="btn btn-outline-info" href="{{ route('radars.edit', ['radar' => $radar->id]) }}">Atnaujinti</a></td>
        <td>
            <form action="{{ route('radars.destroy', ['radar' => $radar->id] )}}" method="POST">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
                <input class="btn btn-outline-danger" type ="submit" value="Istrinti"></input>
            </form>
        </td>
        @endif
    </tr>        
</table>

@endsection