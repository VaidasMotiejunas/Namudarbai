
@extends('layouts.layout')

@section('content')

<table class="table table-hover table-dark">
<thead>
    <tr>
        <th>Name</td>
        <th>City</td>
        <th colspan="2" style="text-align:center">Veiksmai</td>
    </tr>
</thead>
<tbody>

    @foreach($drivers as $driver)
    <tr>
        <td>{{ $driver->name }}</td>
        <td>{{ $driver->city }}</td>

        @if($driver->trashed())
        <td></td>
        <td>
            <form action="{{ route('drivers.restore', ['driver' => $driver->driverId] )}}" method="POST">
            {{ csrf_field() }}
                <input class="btn btn-outline-warning" type="submit" value="Atstatyti"></input>
            </form>
        </td>
        @else
        <td><a class="btn btn-outline-info" href="{{ route('drivers.edit', ['driver' => $driver->driverId]) }}">Atnaujinti</a></td>
        <td>
            <form action="{{ route('drivers.destroy', ['driver' => $driver->driverId] )}}" method="POST">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
                <input class="btn btn-outline-danger" type ="submit" value="istrinti"></input>
            </form>
        </td>
        @endif
    </tr>        
    @endforeach
</tbody>
</table>

{{ $drivers->links() }}

@endsection