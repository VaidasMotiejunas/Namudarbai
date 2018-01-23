<style>
    input {
        width:500px;
        height:20px;
        font-size:8px;
        margin:15px;
    }
</style>
<form action="{{ route('radars.store') }}" method="POST">
    {{ csrf_field() }}
    <input type="string" name="date" placeholder="Iveskite data">
    <input type="string" name="number" placeholder="Iveskite numeri">
    <input type="string" name="time" placeholder="Iveskite laika">
    <input type="string" name="distance" placeholder="Iveskite atstuma">
    <input type="submit" name="Prideti">
</form>