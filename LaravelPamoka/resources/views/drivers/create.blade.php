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
    <form action="{{ route('drivers.store') }}" method="POST">
        {{ csrf_field() }}
        {{ method_field('PUT') }}

        <input class="form-control" value="{{ old('name') }}" type="string" name="name" placeholder="Iveskite vairuotojo varda">
        <input class="form-control" value="{{ old('city') }}" type="string" name="city" placeholder="Iveskite miesta">
        <input class="form-control" value="{{ auth()->user()->id }}" type="hidden" name="user_id">
        <input class="btn btn-outline-info btn-block" type="submit" value="{{ trans('buttons.add') }}">
    </form>
</div>

@endsection