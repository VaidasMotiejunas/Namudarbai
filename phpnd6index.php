<!DOCTYPE html>
<html lang="en">
<head>
<style>
table, th, td {
   border: 1px solid black;
}
table {
    border-collapse: collapse;
}
th, td {
    padding: 5px;
}
tr:hover {
    background-color: #FFF0F5;
}
tr {
    background-color: #FFFFF0;  
}
</style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Namu darbas nr 6</title>
</head>
<body>
<?php

require 'phpnd6data.php';
require 'phpnd6class.php';
require 'phpnd6functions.php';


echo "<h1>Uzduotis nr 1</h1>";
//Turime masyva objektu pav - mokinys
//atspausdinti: varda, pavarde, trimestro vidurkis
//spausdinti i html lentele vidrukiu mazejimo tvarka
//mokinys klase - vardas, pavarde
//mokinys inherits trimestras klase - dalyku masyvas su pazymiais. indeksas dalyko pavadinimas

$mokiniai = [
    new Mokinys ($jonasJonaitisRez, 'Jonas', 'Jonaitis'),
    new Mokinys ($onaButkuteRez, 'Ona', 'Butkute'),
    new Mokinys ($RasaVarnaiteRez, 'Rasa', 'Varnaite'),
    new Mokinys ($juozasLekaviciusRez, 'Juozas', 'Lekavicius'),
];

$sortedMokiniai = sortByAverageRez ($mokiniai);

?>
<table>
<thead>
<tr>
    <td> Vardas, Pavarde </td>
    <td> Vidurkis </td>
</tr>
</thead>
<tbody>
<?php pildomeLentele($sortedMokiniai); ?>
</table>
</body>
</html>