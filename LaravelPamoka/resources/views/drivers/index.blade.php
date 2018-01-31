
@extends('layouts.layout')

@section('content')

<table class="table table-hover">
<thead class="thead-dark" >
    <tr>
        <th>{{ __('Name') }}</td>
        <th>{{ __('City') }}</td>
        <th colspan="2" style="text-align:center">{{ __('Actions') }}</td>
        <th>{{ __('Created_by') }}</td>
        <th>{{ __('Updated_by') }}</td>
    </tr>
</thead>
<tbody class="tbody-light">

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

        @if($driver->created_at && $driver->user_id)
        <td>{{ $driver->user['name'] }}
        @else
        <td>-</td>
        @endif
        
        @if($driver->updated_at && $driver->user_id_upd)
        <td>{{ $driver->userWhoUpdated['name'] }}
        @else
        <td>-</td>
        @endif

    </tr>        
    @endforeach
</tbody>
</table>

{{ $drivers->links() }}

@endsection