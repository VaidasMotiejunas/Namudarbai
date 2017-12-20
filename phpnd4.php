<!DOCTYPE html>
<html lang="en">
<head>
    <title>Namu darbas nr 4</title>
</head>
<body>
<?php

echo "<h1>1 uzduotis</h1>";
echo "<h2>1 variantas</h2>";
// Turime masyva is stringu
//Atspausdinti visas poras laikant kad a + b == b + a

$a = [
    'Jonas',
    'Petras',
    'Antanas',
    'Povilas',
];

/** Spausdinu poras paprastu budu */
echo $a[0] ." ir ". $a[1] . " ";
echo $a[0] ." ir ". $a[2] . " ";
echo $a[0] ." ir ". $a[3] . " ";

echo "<br>";

echo $a[1] ." ir ". $a[2] . " ";
echo $a[1] ." ir ". $a[3] . " ";

echo "<br>";

echo $a[2] ." ir ". $a[3] . " ";

 echo "<br>";
//Rezultatas geras, bet reik automatizuot viska...

echo "<h2>2 variantas</h2>";

 /**Atspausdina (suporuoja) 0 nari su likusiais ir istrina 0 nari */
function poros (array $array)
{
for ($i=0; $i <  count($array); $i++) { 
    if ($array[0] == $array[$i]) {
        continue;
    } else {
        echo $array[0] ." ir ". $array[$i] . " ";
    }
}
array_splice ($array, 0, 1);
return $array;
}

$a =  poros ($a);
echo "<br>";
$a = poros ($a);
echo "<br>";
$a = poros ($a);
echo "<br>";

echo "<h1>2 uzduotis</h1>";
//Turime masyva is stringu
//Atspausdinti visas poras laikant kad a + b != b + a

$b = [
    'Jonas',
    'Petras',
    'Antanas',
    'Povilas',
];

/** Atspausdina (sporuoja) 0 nari su likusiais, tada 0 nari prideda gale masyvo, o pirma nari istrina */
function poros2 (array $array)
{
for ($i=0; $i <  count($array); $i++) { 
    if ($array[0] == $array[$i]) {
        continue;
    } else {
        echo $array[0] ." ir ". $array[$i] . " ";
    }
}
array_push ($array, $array[0]);
array_splice ($array, 0, 1);
return $array;
}

$b =  poros2 ($b);
echo "<br>";
$b = poros2 ($b);
echo "<br>";
$b = poros2 ($b);
echo "<br>";
$b = poros2 ($b);
echo "<br>";

echo "<h1>3 uzduotis</h1>";
/**Turime daugiamati masyva, pirmas indeksas zymi eilute, o antras stulpeli
 * Eilutes gali tureti skirtinga elementu skaiciu
 * Suskaiciuoti stulpeliuose esanciu skaiciu sumas ir isvesti didziausia
 */

$c = [
    [
        1,
        3,
        4,
    ],
    [
        2,
        5,
    ],
    [
        '2' => 3,
        '5' => 8,
    ],
    [
        1,
        1,
        '5' => 1,
    ],
];

$rezArray = [];
foreach ($c as $d) {
    foreach ($d as $key => $value) {
        if (isset ($rezArray[$key])) {
        $rezArray[$key] += $value; //Jei egzistuoja pridedame prie ats masyvo reiksmes duoto masyvo reiksme
    } else {
        $rezArray[$key] = $value; // jei neegzistuoja tada ats masyvo reiksme prilyginama duoto masyvo reiksmei 
    }
}
}

echo max ($rezArray);

?>
</body>
</html>