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

function pildomeLentele (array $array){
    foreach ($array as $vardas => $vidurkis) {
        $vidurkis = round($vidurkis, 2);
        echo "<tr>
            <td>$vardas</td>
            <td>$vidurkis</td>
            </tr>";
    }
}

?>