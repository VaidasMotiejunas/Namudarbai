<?php

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

function __construct($dalykai, $vardas, $pavarde){
    parent:: __construct($dalykai);
    $this->vardas = $vardas;
    $this->pavarde = $pavarde;
}
}

?>