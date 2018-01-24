@extends ('layouts.layout')
@section('content')

<div style="container">
    <form action="{{ route('radars.store') }}" method="POST">
        {{ csrf_field() }}
        {{ method_field('PUT') }}

        <input type="string" name="date" placeholder="Iveskite data">
        <input type="string" name="number" placeholder="Iveskite valstybini numeri">
        <input type="string" name="time" placeholder="Iveskite laika">
        <input type="string" name="distance" placeholder="Iveskite atstuma">
        <input type="submit" value="Pridėti">
    </form>
</div>

@endsection