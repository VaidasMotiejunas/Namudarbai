<!DOCTYPE html>
<html lang="en">
<head>
    <title>Namu darbas nr 3</title>
</head>
<body>
<?php
//turime du masyvus.
//Rasti kiekvieno masyvo skaiciu vidurki
//atspausdinti ju skirtuma
//naudoti funkcijas
//rezultatas - -1.25

$a = [5, 6, 10, 15];
$b = [8, 5, 3, 25];

/** Paskaiciuoja masyvo elementu vidurki */

function vidurkis (array $vid)
{
$sum = 0;
for ($i=0; $i < count($vid) ; $i++) { 
    $sum += $vid[$i];
}

$rez = $sum / count ($vid);
return $rez;
}

/** Paskaiciuoja dvieju int skirtuma */

function skirtumas (int $sk1, $sk2)
{
    /**if ($sk1 > $sk2) {
        return $sk1 - $sk2;
    } else {
        return $sk2 - $sk1;
    }
*/
return $sk1 - $sk2; // Palikau tik sita, kad gauciau atsakyma su minusu
}

$vid1 =  vidurkis ($a);
$vid2 =  vidurkis ($b);
$skir = skirtumas ($vid1, $vid2);

echo "<h1> Pirmas uzdavinys </h1>";

echo "Pirmo masyvo vidurkis yra " . $vid1 . "<br>";
echo "Antro masyvo vidurkis yra " . $vid2 . "<br>";
echo "Ju skirtumas yra " . $skir. "<br>";

// Surasti tobulus skaicius intervale nuo 1 iki 1000
// Dalinkliu radimui ir tikrinimui sukurti atskiras funkcijas

/** Suranda tobulus skaicius iki pateikto skaiciaus ir patalpina i array*/
function tobuliSkaiciai(int $var = 1000)
{
$a = 1;
$atsakymas = [];
$elementoNr = 0;
while ($a <= $var) {
    $sum = 0;
    for ($i=1; $i < $a; $i++) {
        $arDalinas = $a / $i;
        if (is_int($arDalinas)) {
            $sum += $i;
        }
    }
    if ($sum == $a) {
        $atsakymas[$elementoNr] = $a;
        $elementoNr++; 
    }
    $a++;
}
//var_dump ($atsakymas);
return $atsakymas;
}

/** Suranda pateikto masyvo visu skaiciu daliklius */

function dalikliai (array $array) 
{
    for ($i=0; $i < count($array); $i++) {
        echo "Skaiciaus " . $array[$i] . " dalikliai: ";
        for ($j=1; $j < $array[$i]; $j++) { 
        $arDalinas = $array[$i] / $j;
        if (is_int($arDalinas)) {
            echo $j . " ";
    }
    }
    echo"<br>";
}
}

echo "<h1> Antras uzdavinys </h1>";

//Ieskome tobulu skaiciu default iki 1000
$tobuliSkaiciai = tobuliSkaiciai(1000);
echo "Tobulieji skaiciai intervale: 0 - 1000 yra: ";

//Spausdiname rastus skaicius
foreach ($tobuliSkaiciai as $x) {
    echo $x . " ";
}
echo "<br>";

//Spausdiname ju daliklius
dalikliai($tobuliSkaiciai);

?>
</body>
</html>