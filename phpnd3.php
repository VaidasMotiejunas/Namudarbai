<!DOCTYPE html>
<html lang="en">
<head>
    <title>Namu darbas nr 2</title>
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
    /*if ($sk1 > $sk2) {
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

echo "Pirmo masyvo vidurkis yra " . $vid1 . "<br>";
echo "Antro masyvo vidurkis yra " . $vid2 . "<br>";
echo "Ju skirtumas yra " . $skir. "<br>";

// Surasti tobulus skaicius intervale nuo 1 iki 1000
// Dalinkliu radimui ir tikrinimui sukurti atskiras funkcijas

for ($i=1; $i < 1001 ; $i++) {
    $x = $i;
    for ($j=$x-1; $j == 1; $j--) { 
        $y = $x/($x-$j);
        if (is_int ($y)) {
            $sum += $y; 
            }
        }
    
    if ($x == $sum) {
        echo $x;
    } 
}



?>
</body>
</html>