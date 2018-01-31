@extends('layouts.layout')
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
    <form action="{{ route('radars.update', ['radar' => $radar->id]) }}" method="POST">
        {{ csrf_field() }}
        {{ method_field('PUT') }}

        <input class="form-control" type="string" name="date" value="{{ $radar->date }}">
        <input class="form-control" type="string" name="number" value="{{ $radar->number }}">
        <input class="form-control" type="string" name="time" value="{{ $radar->time }}">
        <input class="form-control" type="string" name="distance" value="{{ $radar->distance }}">
        <input class="form-control" value="{{ auth()->user()->id }}" type="hidden" name="user_id_upd">
        <input class="btn btn-outline-info btn-block" type="submit" value="{{ trans('buttons.edit') }}">
    </form>
</div>

@endsection