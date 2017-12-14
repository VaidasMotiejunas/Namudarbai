<!DOCTYPE html>
<html lang="en">
<head>
    <title>Namu darbas nr 2</title>
</head>
<body>
<?php
// Uzdavinys nr 1 ir nr 2
$tKr = [
    [3, 4, 5],
    [2, 10, 8,],
    [5, 6, 5],
    [5, 5, 5],
];

for ($i=0; $i < count ($tKr) ; $i++) { 
        $tk1 = $tKr[$i][0];
        $tk2 = $tKr[$i][1];
        $tk3 = $tKr[$i][2];
        if (($tk1 + $tk2 > $tk3) && ($tk1 + $tk3 > $tk2) && ($tk2 + $tk3 > $tk1)){
        $triknr = $i + 1;
        $puseP = ($tk1 + $tk2 + $tk3)/2;
        $plotas = sqrt($puseP*(($puseP - $tk1)*($puseP - $tk2)*($puseP - $tk3)));
        if (($tk1 == $tk2) && ($tk1 == $tk3)) {
            echo "Trikampis nr ".$triknr." yra lygiakrastis, jo plotas yra ".$plotas."<br>";
        } elseif (($tk1 != $tk2) &&
                  ($tk1 != $tk3) &&
                  ($tk2 != $tk3)){
            echo "Trikampis nr ".$triknr." yra ivairiasonis, jo plotas yra ".$plotas."<br>";
            } else {
                echo "Trikampis nr ".$triknr." yra lygiasonis, jo plotas yra ".$plotas."<br>";
            }
        } else {
            echo "Toks trikampis neegzistuoja<br>";
        }
    }

// uzdavinys nr 3
echo "Masyvo elementai didejimo tvarka: ";
$array = [-10, 0, 2, 9, -5];
$a = 0;
while ($a < count ($array)) {
    $min = $array[0];
    for ($i = 1; $i < count ($array); $i++) { 
    if ($min > $array[$i]) {
        $min = $array[$i];  
    }
}
echo $min.' ';
$trinam = array_search ($min, $array);
array_splice ($array, $trinam, 1);
}

?>
</body>
</html>