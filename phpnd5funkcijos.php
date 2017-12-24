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
        echo $vyrReiksme. " ir ". $motReiksme. "<br>";
    }
}
}

function groupOfThree (array $array){
    //Finds all possible groups of three. a+b+c != a+c+b
    $groups = [];
    $i = 0;
    foreach ($array as $person) {
        foreach ($array as $person2) {
            foreach ($array as $person3) {
                $groups[$i][0] = $person ['vardas'];
                $groups[$i][1] = $person2 ['vardas'];
                $groups[$i][2] = $person3 ['vardas'];
                $i++;
            }
        }
    }
    //Makes a new array without recurring elements, a+a+a is left out. a+b+c != a+c+b
    $groups2 = [];
    $i = 0;
    foreach ($groups as $key => $group) {
        if (($group[0] != $group[1]) && ($group[0] != $group[2]) &&
            ($group[1] != $group[2])){
                $groups2[$i] = $group;
                $i++;
        }
    }
    //Rearanges all possible groups in ascending order.
    for ($i=0; $i < count($groups2); $i++) { 
        array_multisort($groups2[$i], SORT_ASC, SORT_STRING);
     }
    //Deletes recurring elements. 
     foreach ($groups2 as $key1 => $value1) {
        foreach ($groups2 as $key2 => $value2) {
            if ($key1 == $key2) { // Panasu, kad - && ($value1 == $value2) nereikalingas
                continue;
            } elseif ($value1 == $value2){
                    unset ($groups2[$key1]);
            }
        }
    }
    //Prints all posible groups of three. a+b+c == a+c+b
    foreach ($groups2 as $smallArray) {
        foreach ($smallArray as $value) {
            echo " ". $value. " ";
        }
        echo "<br>";
    }
}
?>
