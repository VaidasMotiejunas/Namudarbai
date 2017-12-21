<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Namu darbas nr 6</title>
</head>
<body>
<?php
echo "<h1>Uzduotis nr 1</h1>";
//Turime masyva objektu pav - mokinys
//atspausdinti: varda, pavarde, trimestro vidurkis
//spausdinti i html lentele vidrukiu mazejimo tvarka
//mokinys klase - vardas, pavarde
//mokinys inherits trimestras klase - dalyku masyvas su pazymiais. indeksas dalyko pavadinimas

class Trimestras 
{
public $dalykai;

function __construct($dalykai){
    $this->dalykai = $dalykai;
}
function vidurkiai ()
{
$bendrasVidurkis = 0;
$pamokos = $this->dalykai;
foreach ($pamokos as $dalykas => $pazymiai){
    $sum = 0;
    $vid = 0;
    foreach ($pazymiai as $values){
    $sum += $values;
}
$vid = $sum / count($pazymiai);
$bendrasVidurkis += $vid;
}
$bendrasVidurkis /= count($pamokos);
return $bendrasVidurkis;
}
}


class Mokinys extends Trimestras
{
public $vardas;
public $pavarde;

function __construct($dalykai, $vardas, $pavarde){
    parent:: __construct($dalykai);
    $this->vardas = $vardas;
    $this->pavarde = $pavarde;
}
}

$JonoPaz = [
        'lietuviu'=>[9, 10, 8, 7], //8.5
        'anglu'=>[5, 2, 8, 7], // 5.5
        'matematika'=>[9, 1, 7, 7], //6
];

$mokinys1 = new Mokinys($JonoPaz, 'Jonas', 'Jonaitis');
echo $mokinys1->vidurkiai();

?>
</body>
</html>