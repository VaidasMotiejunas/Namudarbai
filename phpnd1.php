<!DOCTYPE html>
<html lang="en">
<head>
    <title>Namu darbas</title>
</head>
<body>
<?php
echo "<h1>Masyvai</h1>";
//Duotas masyvas a. Suskaiciuokite vidutine masyvo elementu reiksme
$a1 = [
    10,
    20,
    30,
    40,
    50,
    ];
$sum = 0;
for ($i = 0; $i < count ($a1); $i++) {  
    $sum += $a1[$i];
}
//$vid = 0; Kodel nemeta error jei nenurodau?
$vid = $sum / count ($a1);
echo "Masyvo a vidutine elementu reiksme yra $vid<br>";

//Duotas masyvas a. Suskaiciuokite lyginiu indeksu masyvo elementu suma
$a2 = [
    1,
    3,
    5,
    7,
    9,
    11,
];
$sum = 0;
for ($i = 0; $i < count ($a2) ; $i++) { 
    if ($i % 2 == 0) {
        $sum += $a2[$i];
    }
}
echo "Masyvo a lyginiu indeksu elementu suma yra $sum<br>";

//Duotas masyvas a. Atsausdinkite elementus didejimo tvarka
$a3 = [
    5,
    3,
    7,
    1,
    9,
];

echo "Masyvo a elementai surikiuoti didejimo tvarka: ";

sort ($a3);
for ($i=0; $i < count ($a3); $i++) { //Veikia, bet reikia padaryt be sort turbut...
    echo $a3[$i];
    echo ", ";
}
/*
$min = $a3[0];
for ($i = 1; $i < count ($a3); $i++) { 
    if ($min > $a3[$i]) {
        $min = $a3[$i]; //randame maziausia array nari 
    }
}
echo $min; // Kas toliau?? Susikurti tuscia masyva ir i ji talpinti reiksmes nuo min
*/

echo "<h1>Daugiamaciai masyvai</h1>";

/* Duotas dagiamatis masyvas m elementu, kuriu kiekvienas
 yra masyvas is n elementu. Suskaiciuoti visu stulpeliu sumas ir atspausdinti*/

 $b1 = [
    [5, 4, 1, 4],
    [1, 2, 2, 4],
    [6, 1, 3, 4],
];

echo "Masyvu stulpeliu sumos: ";

$stulpeliosuma = 0;
for ($j=0; $j < count ($b1[0]) ; $j++) { //sukas tiek kiek pirma eilute turi nariu
    for ($i = 0; $i < count ($b1) ; $i++) { // keicia eilutes 0 1 2
    $stulpeliosuma += $b1[$i][$j];
}
 echo "$stulpeliosuma, ";
 $stulpeliosuma = 0;
}
echo "<br>";
//Salyga tokia pat tik reik atspausdinti didziausia suma

$b2 = [
    [5, 12, 30, 9],
    [9, 1, 14, 9],
    [10, 1, 3, 9],
];
$k = 0; // naujo array indeksas
$stulpeliosuma = 0;
for ($j=0; $j < count ($b2[0]) ; $j++) { //sukas tiek kiek pirma eilute turi nariu
    for ($i = 0; $i < count ($b2) ; $i++) { // keicia eilutes 0 1 2
    $stulpeliosuma += $b2[$i][$j];
}
$naujasArray[$k] = $stulpeliosuma; //sudarome nauja array is stulpeliu sumu
$k++;
$stulpeliosuma = 0; //isvalome suma naujai stulpelio sumai
}
$maxStulpelis = $naujasArray[0];
for ($i=0; $i < count ($naujasArray) ; $i++) { 
    if ($maxStulpelis < $naujasArray[$i]) {
        $maxStulpelis = $naujasArray[$i];
    }
}
echo "Didziausia stulpelio suma yra ".$maxStulpelis ."<br>";

//Duotas daugiamatis masyvas b turintis n eiluciu ir n stulpeliu. Suskaiciuokite ir
//atspausdinkite visu elementu esanciu abiejuose istrizainese sumas.
$b3 = [
    [10,2,3],
    [3,10,1],
    [2,3,10],
];

$istrizainessuma = 0;
$stulpeliosk = 0;

for ($i=0; $i < count ($b3) ; $i++) { 
    $istrizainessuma += $b3[$i][$stulpeliosk]; //sudedame visus istrizaines narius
    $stulpeliosk++; //piesia istrizaine
}
echo "Pirmos istrizaines suma yra ".$istrizainessuma."<br>";

$istrizainessuma = 0;
$stulpeliosk = count ($b3) - 1;

for ($i=0; $i < count ($b3) ; $i++) { 
    $istrizainessuma += $b3[$i][$stulpeliosk];
    $stulpeliosk--;
}
echo "Antros istrizaines suma yra ".$istrizainessuma."<br>";

?>
</body>
</html>