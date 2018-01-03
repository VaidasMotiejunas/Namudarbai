<!DOCTYPE html>
<html lang="en">
<head>
<style>
    h1 {
        text-align: center;
        font-size: 25px;
        text-shadow: 0px 0px 2px white;
    }
    input[type=text], select {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }   
    input[type=date], select {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box; 
    }
    input[type=number], select {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    input[type=submit] {
        width: 100%;
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    input[type=submit]:hover {
        background-color: #45a049;
    }

    div {
        border-radius: 5px;
        background-color: #f2f2f2;
        padding: 20px;
    }
    body {
        background: url("https://ifoto.delfi.lt/show_display.php?id=7328136&width=1200&height=1200&mode=-1") left top;
        background-size: 225px 150px;
    }
    table {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        border-radius: 5px;
        background-color: #f2f2f2;
        padding: 20px;
    }

</style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Namu darbas nr 9</title>
</head>
<body>
<h1>Automobiliu registracija</h1>

<div>
    <form action ="nd9.php" method ="post">
        <label for = "data">Ivykio data</label>
        <input id = "data" name ="dateOfEvent" type = "date" placeholder = "Iveskite ivykio data"> <br>
        <label for = "numeris">Valstybinis automobilio numeris</label>
        <input id = "numeris" name ="plateNumber" type = "text" placeholder = "Iveskite automobilio valstybini numeri"> <br>
        <label for = "distancija">Iveikta distancija</label>
        <input id = "distancija" name ="distance" type = "number" placeholder = "Iveskite nuvaziuota distancija metrais"> <br>
        <label for = "laikas">Sugaistas laikas</label>
        <input id = "laikas" name ="time" type = "number" placeholder = "Iveskite sugaista laika sekundemis"> <br>
        <input type ="submit" value = "Ivesti duomenis">
    </form>
</div>
<br>

<table>
<thead>
<tr>
    <td>Ivykio data</td>
    <td>Valstybinis numeris</td>
    <td>Uzfiksuotas greitis</td>
</tr>
</thead>
<tbody>
<?php ?>
</tbody>
</table>


</body>
</html>
