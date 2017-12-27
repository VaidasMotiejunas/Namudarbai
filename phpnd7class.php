<?php

class Trimestras 
{
public $dalykai;

function __construct($dalykai){
    $this->dalykai = $dalykai;
}
function vidurkiai (){
$bendrasVidurkis = 0;
$pamokos = $this->dalykai;
foreach ($pamokos as $dalykas => $pazymiai){
    $vid = 0;
    foreach ($pazymiai as $values){
    $vid += $values;
}
$vid /= count($pazymiai);
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
public $gimimoData;

function __construct($dalykai, $vardas, $pavarde, $gimimoData){
    parent:: __construct($dalykai);
    $this->vardas = $vardas;
    $this->pavarde = $pavarde;
    $this->gimimoData = $gimimoData;
}
function kiekMetu (){
    $gimimoData = $this->gimimoData;
    $skirtumas = date_diff($gimimoData, date_create());
    return round($skirtumas->y, 0, PHP_ROUND_HALF_DOWN);
}
}


?>