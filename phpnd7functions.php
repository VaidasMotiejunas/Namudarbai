<?php

function sortByAverageRez (array $array){
    $mokiniuVidurkiai = [];
    $mokiniuVardPav = [];
    $surikiuotiVidurkiai = [];
    $i = 0;
    foreach ($array as $mokinys) {
        $mokiniuVardPav[$i] = $mokinys->vardas . " " . $mokinys->pavarde;
        $mokiniuVidurkiai[$i] = $mokinys->vidurkiai();
        $i++;
    }
    
    $surikiuotiVidurkiai = array_combine ($mokiniuVardPav, $mokiniuVidurkiai);
    arsort($surikiuotiVidurkiai); 
    return $surikiuotiVidurkiai;
}

function pildomeVidurkiuLentele (array $array){
    foreach ($array as $vardas => $vidurkis) {
        $vidurkis = round($vidurkis, 2);
        echo "<tr>
            <td>$vardas</td>
            <td>$vidurkis</td>
            </tr>";
    }
}

function sortByAge (array $array){
    $mokiniuVardPav = [];
    $mokiniuAmzius = [];
    $surikiuotiPagalAmziu = [];
    $i = 0;
    foreach ($array as $mokinys) {
        $mokiniuVardPav[$i] = $mokinys->vardas . " " . $mokinys->pavarde;
        $mokiniuAmzius[$i] = $mokinys->kiekMetu();
        $i++;
    }
    
    $surikiuotiPagalAmziu = array_combine ($mokiniuVardPav, $mokiniuAmzius);
    arsort($surikiuotiPagalAmziu); 
    return $surikiuotiPagalAmziu;
}

function pildomeAmziausLentele (array $array){
    foreach ($array as $vardas => $amzius) {
        if ($amzius < 18) {
            continue;
        }
        echo "<tr>
            <td>$vardas</td>
            <td>$amzius</td>
            </tr>";
    }
}

?>