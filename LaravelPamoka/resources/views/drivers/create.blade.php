@extends ('layouts.layout')

@section('content')

<div style="container">
    <form action="{{ route('drivers.store') }}" method="POST">
        {{ csrf_field() }}
        {{ method_field('PUT') }}

        <input type="string" name="name" placeholder="Iveskite vairuotojo varda">
        <input type="string" name="city" placeholder="Iveskite miesta">
        <input type="submit" value="Pridėti">
    </form>
</div>

@endsection