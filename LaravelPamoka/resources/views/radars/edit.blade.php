@extends('layouts.layout')

@section('content')

<style>
    input {
        width: 500px;
        height: 50px;
        font-size: 24px;
        margin: 15px;
        text-align: center;
    }
</style>

<div style="width: 500px;">
    <form action="{{ route('radars.update', ['radar' => $radar->id]) }}" method="POST">
        {{ csrf_field() }}
        {{ method_field('PUT') }}

        <input type="string" name="date" value="{{ $radar->date }}">
        <input type="string" name="number" value="{{ $radar->number }}">
        <input type="string" name="time" value="{{ $radar->time }}">
        <input type="string" name="distance" value="{{ $radar->distance }}">
        <input type="submit" value="Atnaujinti">
    </form>
</div>

@endsection