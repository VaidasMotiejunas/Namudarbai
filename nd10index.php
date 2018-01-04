<!DOCTYPE html>
<html lang="en">
<head>
<style>
    h1 {
        text-align: center;
        font-size: 25px;
        text-shadow: 0px 0px 2px white;
    }
    h2 {
        text-align: center;
        font-size: 15px;
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
        border-collapse: collapse;
    }
    th, td {
        border: 1px solid black;
        border-collapse: collapse;
        padding: 10px;
    }

</style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Namu darbas nr 9</title>
</head>
<body>
<?php require 'nd10.php'; ?>
<h1>Automobiliu registracija</h1>

<div>
    <form action ="nd10index.php" method ="post">
        <label for = "data">Ivykio data</label>
        <input id = "data" name ="dateOfEvent" type = "date" placeholder = "Iveskite ivykio data"> <br>
        <label for = "numeris">Valstybinis automobilio numeris</label>
        <input id = "numeris" name ="plateNumber" type = "text" placeholder = "Iveskite automobilio valstybini numeri"> <br>
        <label for = "distancija">Iveikta distancija</label>
        <input id = "distancija" name ="distance" type = "number" placeholder = "Iveskite nuvaziuota distancija metrais"> <br>
        <label for = "laikas">Sugaistas laikas</label>
        <input id = "laikas" name ="time" type = "number" placeholder = "Iveskite sugaista laika sekundemis"> <br>
        <label for = "filtras">Duomenu filtravimas</label>
        <input id = "filtras" name ="filter" type = "text" placeholder = "Iveskite valstybini automobilio nr ar jo dali"> <br>
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
    echo "<h2>Uzpildykite visus laukelius</h2>";
    return;
    //header("Location: {$_SERVER['HTTP_REFERER']}"); //Grazina i ta pati psl, tada vel neguna reiksmes ir taip be galo. Neveikia siuo atveju. 
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

$eventObj = sortEvents ($eventObj);

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
if ($_REQUEST['filter'] == "") {
    foreach ($eventObj as $events) {
        echo "<tr>
                <td>$events->dateOfEvent</td>
                <td>$events->plateNumber</td>
                <td>{$events->getSpeed()}</td>
            </tr>";
    }
} else {
    $filter = "/(" . $_REQUEST['filter'] . ")/i";
    echo "<h2>Vaizduojami rezultatai, kuriu valstybiniai numeriai turi: " . $_REQUEST['filter'] . "</h2><br>";
    foreach ($eventObj as $events) {
        if (preg_match($filter, $events->plateNumber)) {
            echo "<tr>
                    <td>$events->dateOfEvent</td>
                    <td>$events->plateNumber</td>
                    <td>{$events->getSpeed()}</td>
                </tr>";
        }
    }
} // Norint iskviesti funkcija reik {}
?>
</table>
</body>
</html>
