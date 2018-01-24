
@extends('layouts.layout')

@section('content')

<table class="table tble-stripped table-dark">
    <tr>
        <td>Name</td>
        <td>City</td>
    </tr>

    @foreach($drivers as $driver)
    <tr>
        <td>{{ $driver->name }}</td>
        <td>{{ $driver->city }}</td>

        @if($driver->trashed())
        <td>
            <form action="{{ route('drivers.restore', ['driver' => $driver->driverId] )}}" method="POST">
            {{ csrf_field() }}
                <input class="btn btn-warning" type="submit" value="Atstatyti"></input>
            </form>
        </td>
        @else
        <td><a href="{{ route('drivers.edit', ['driver' => $driver->driverId]) }}">Atnaujinti</a></td>
        <td>
            <form action="{{ route('drivers.destroy', ['driver' => $driver->driverId] )}}" method="POST">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
                <input type ="submit" value="istrinti"></input>
            </form>
        </td>
        @endif
    </tr>        
    @endforeach
</table>

{{ $drivers->links() }}

@endsection