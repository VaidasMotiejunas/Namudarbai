<?php

/**Isskaido gauto array elementus i atskirus masyvus pagal pateikta lyti
 * Atspausdina visas V + M poras */
function pairMenAndWomen (array $array)
{
$vyrai = [];
$moterys = [];
foreach ($array as $smallArray) {
    foreach ($smallArray as $key => $value) {
        if ($smallArray['lytis'] == 'V') {
            array_push ($vyrai, $smallArray['vardas']);
        } else{
            array_push ($moterys, $smallArray['vardas']);
        }
        break;
    }
}
foreach ($vyrai as $vyrReiksme) {
    foreach ($moterys as $motReiksme) {
        echo $vyrReiksme. " ir ". $motReiksme. " ";
    }
    echo "<br>";
}
}

/**TODO Sugalvoti kaip skirstyt i grupes... */

//function pairGroup (array $array)
/*TODO Sugalvoti kaip nespausdinti tu paciu nariu. Gal panaudojus istrinti nari is array ???
$vyrai = [];
$moterys = [];
foreach ($zmones as $smallArray) {
    foreach ($smallArray as $key => $value) {
        if ($smallArray['lytis'] == 'V') {
            array_push ($vyrai, $smallArray['vardas']);
        } else{
            array_push ($moterys, $smallArray['vardas']);
        }
        break;
    }
}
foreach ($vyrai as $vyrReiksme) {
    foreach ($moterys as $motReiksme) {
        foreach ($vyrai as $vyrReiksme2){
            if ($vyrReiksme2 != $vyrReiksme) {
                echo $vyrReiksme. " + ". $motReiksme. " + ". $vyrReiksme2. "<br>";
            } else{
            continue;
        }
    }
}
}
foreach ($moterys as $motReiksme) {
    foreach ($vyrai as $vyrReiksme) {
        foreach ($moterys as $motReiksme2){
            if ($motReiksme2 != $motReiksme) {
                echo $motReiksme. " + ". $vyrReiksme. " + ". $motReiksme2. "<br>";
            }
        }
    }
}
*/
?>
