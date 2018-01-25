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
    <form action="{{ route('drivers.update', ['driver' => $driver->id]) }}" method="POST">
        {{ csrf_field() }}
        {{ method_field('PUT') }}

        <input class="form-control" type="string" name="name" value="{{ $driver->name }}">
        <input class="form-control" type="string" name="city" value="{{ $driver->city }}">
        <input class="btn btn-outline-info btn-block" type="submit" value="Atnaujinti">
    </form>
</div>

@endsection