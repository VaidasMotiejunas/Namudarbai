
@extends('layouts.app')

@section('content')

<table class="table table-hover table-dark">
<thead>
    <tr>
        <th>{{ trans('radars.date') }}</td>
        <th>{{ trans('radars.number') }}</td>
        <th>{{ trans('radars.speed', ['metrics' => 'km/h']) }}</td>
        <th>{{ trans('radars.name') }}</td>
        <th>{{ trans('radars.city') }}</td>
        <th colspan="2" style="text-align:center" >{{ trans('radars.actions') }}</td>
        <th>{{ trans('radars.created_by') }}</td>
        <th>{{ trans('radars.updated_by') }}</td>
    </tr>
</thead>
<tbody>
    @foreach($radars as $radar)
    <tr>
        <td>{{ $radar->date }}</td>
        <td>{{ $radar->number }}</td>
        <td>{{ round($radar->distance / $radar->time, 2) }}</td>

        @if($radar->driver)
        <td>{{ $radar->driver->name }}</td>
        <td>{{ $radar->driver->city }}</td>
        @else
        <td>-</td>
        <td>-</td>
        @endif

        @if($radar->trashed())
        <td></td>
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
                <input class="btn btn-outline-danger" type ="submit" value="istrinti"></input>
            </form>
        </td>
        @endif

        @if($radar->created_at && $radar->user_id)
        <td>{{ $radar->user['name'] }}
        @else
        <td>-</td>
        @endif
        
        @if($radar->updated_at && $radar->user_id_upd)
        <td>{{ $radar->userWhoUpdated['name'] }}
        @else
        <td>-</td>
        @endif
    </tr>        
    @endforeach
</tbody>
</table>

{{ $radars->links() }}

@endsection