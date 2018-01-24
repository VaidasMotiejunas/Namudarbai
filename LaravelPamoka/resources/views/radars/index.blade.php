
@extends('layouts.layout')

@section('content')

<table class="table tble-stripped table-dark">
    <tr>
        <td>Data</td>
        <td>Numeris</td>
        <td>Greitis</td>
    </tr>

    @foreach($radars as $radar)
    <tr>
        <td>{{ $radar->date }}</td>
        <td>{{ $radar->number }}</td>
        <td>{{ $radar->distance / $radar->time }}</td>

        @if($radar->trashed())
        <td>
            <form action="{{ route('radars.restore', ['radar' => $radar->id] )}}" method="POST">
            {{ csrf_field() }}
                <input class="btn btn-warning" type="submit" value="Atstatyti"></input>
            </form>
        </td>
        @else
        <td><a href="{{ route('radars.edit', ['radar' => $radar->id]) }}">Atnaujinti</a></td>
        <td>
            <form action="{{ route('radars.destroy', ['radar' => $radar->id] )}}" method="POST">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
                <input type ="submit" value="istrinti"></input>
            </form>
        </td>
        @endif
    </tr>        
    @endforeach
</table>

{{ $radars->links() }}

@endsection