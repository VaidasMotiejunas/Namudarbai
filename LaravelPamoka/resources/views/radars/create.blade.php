@extends ('layouts.layout')
@section('content')

<style>
    input {
        width: 250px;
        height: 30px;
        font-size: 15px;
        margin: 8px;
        text-align: center;
    }
</style>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div style="width: 500px;">
    <form action="{{ route('radars.store') }}" method="POST">
        {{ csrf_field() }}
        {{ method_field('PUT') }}

        <input class="form-control" value="{{ old('date') }}" type="string" name="date" placeholder="Iveskite data">
        <input class="form-control" value="{{ old('number') }}" type="string" name="number" placeholder="Iveskite valstybini numeri">
        <input class="form-control" value="{{ old('time') }}" type="string" name="time" placeholder="Iveskite laika">
        <input class="form-control" value="{{ old('distance') }}" type="string" name="distance" placeholder="Iveskite atstuma">
        <input class="form-control" value="{{ auth()->user()->id }}" type="hidden" name="user_id">
        <input class="btn btn-outline-info btn-block" type="submit" value="Pridėti">
    </form>
</div>

@endsection