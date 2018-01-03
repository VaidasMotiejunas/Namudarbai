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
<?php require 'nd9.php'; ?>
<h1>Automobiliu registracija</h1>

<div>
    <form action ="nd9index.php" method ="post">
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

<?php 

if (!isset($_COOKIE)) {
    $cookieId = 0;
} else {
    $cookieId = count($_COOKIE) / 4;
}

if (!($_REQUEST['dateOfEvent']) || !($_REQUEST['plateNumber']) || !($_REQUEST['distance']) || !($_REQUEST['time'])) {
    echo "Uzpildykite visus laukelius";
    //header("Location: {$_SERVER['HTTP_REFERER']}"); //Grazina i pries tai buvusi psl. Neveikia kai tam paciam faile
} else {
    setcookie($cookieId.'plateNumber', $_REQUEST['plateNumber']);
    setcookie($cookieId.'dateOfEvent', $_REQUEST['dateOfEvent']);
    setcookie($cookieId.'distance', $_REQUEST['distance']);
    setcookie($cookieId.'time', $_REQUEST['time']);
}

$eventObj = [];
for ($i=0; $i < count($_COOKIE)/4; $i++) {
    array_push ($eventObj, new Radar($_COOKIE[$i.'plateNumber'], $_COOKIE[$i.'dateOfEvent'], $_COOKIE[$i.'distance'], $_COOKIE[$i.'time']));
}

usort ($eventObj, function ($a, $b) { //Jei naudoju sortEvents nerusiuoja array.
    return ($a->getSpeed() < $b->getSpeed()); 
});
// sortEvents ($eventObj); Neveikia 
// var_dump ($eventObj);

?>
<table>
<thead>
<tr>
    <td>Ivykio data</td>
    <td>Valstybinis numeris</td>
    <td>Uzfiksuotas greitis, km/h</td>
</tr>
</thead>
<tbody>
</tbody>
<?php
foreach ($eventObj as $radar) {
    $speed = round($radar->distance / $radar->time * 3.6, 1);
    echo "<tr>
            <td>$radar->dateOfEvent</td>
            <td>$radar->plateNumber</td>
            <td>$speed</td>
        </tr>";
} //Neleidzia naudoti <td>$radar->getSpeed()</td>
?>
</table>
</body>
</html>
