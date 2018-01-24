@extends('layouts.layout')

@section('content')

<div style="width: 500px;">
    <form action="{{ route('drivers.update', ['driver' => $driver->id]) }}" method="POST">
        {{ csrf_field() }}
        {{ method_field('PUT') }}

        <input type="string" name="name" value="{{ $driver->name }}">
        <input type="string" name="city" value="{{ $driver->city }}">
        <input type="submit" value="Atnaujinti">
    </form>
</div>

@endsection