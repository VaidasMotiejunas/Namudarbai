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
    <title>Namu darbas nr 7</title>
</head>
<body>
<?php

require 'phpnd7data.php';
require 'phpnd7class.php';
require 'phpnd7functions.php';


echo "<h1>Namu darbas nr 6</h1>";
//Turime masyva objektu pav - mokinys
//atspausdinti: varda, pavarde, trimestro vidurkis
//spausdinti i html lentele vidrukiu mazejimo tvarka
//mokinys klase - vardas, pavarde
//mokinys inherits trimestras klase - dalyku masyvas su pazymiais. indeksas dalyko pavadinimas

$mokiniai = [
    new Mokinys ($jonasJonaitisRez, 'Jonas', 'Jonaitis', new DateTime('1999-10-01')),
    new Mokinys ($onaButkuteRez, 'Ona', 'Butkute', new DateTime('1998-05-10')),
    new Mokinys ($RasaVarnaiteRez, 'Rasa', 'Varnaite', new DateTime('2002-01-01')),
    new Mokinys ($juozasLekaviciusRez, 'Juozas', 'Lekavicius', new DateTime('2001-11-13')),
];

$sortedMokiniai = sortByAverageRez ($mokiniai);
$sortedMokiniai2 = sortByAge ($mokiniai);

?>
<table>
<thead>
<tr>
    <td> Vardas, Pavarde </td>
    <td> Vidurkis </td>
</tr>
</thead>
<tbody>
<?php pildomeVidurkiuLentele($sortedMokiniai); ?>
</table>

<h1>Namu darbas nr 7</h1>
<!--
Papildyti Mokinys klase gimimo 
Sukurti Mokinio klasei metoda kiekMetu
Atspausdinti tik tuos mokinius, kuriem virs 18
-->
<table>
<thead>
<tr>
    <td> Vardas, Pavarde </td>
    <td> Amzius, metais </td>
</tr>
</thead>
<tbody>
<?php pildomeAmziausLentele($sortedMokiniai2); ?>
</table>

</body>
</html>