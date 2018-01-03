<?php

if (!($_REQUEST['dateOfEvent']) || !($_REQUEST['plateNumber']) || !($_REQUEST['distance']) || !($_REQUEST['time'])) {
    header("Location: {$_SERVER['HTTP_REFERER']}"); //Grazina i pries tai buvusi psl.
exit; //Kaip parasyti alerta???
}

if (isset($_REQUEST['plateNumber'])) {
    setcookie('plateNumber', $_REQUEST['plateNumber']);
} else {
    echo "Neivestas automobilio valstybinis numeris"; //Neraso, nes header("Location: {$_SERVER['HTTP_REFERER']}"); grazina i pries tai buvusi psl
}

if (isset($_REQUEST['dateOfEvent'])) {
    setcookie('dateOfEvent', $_REQUEST['dateOfEvent']);
} else {
    echo "Neivesta ivykio data";
}

if (isset($_REQUEST['distance'])) {
    setcookie('distance', $_REQUEST['distance']);
} else {
    echo "Neivesta distancija";
}

if (isset($_REQUEST['time'])) {
    setcookie('time', $_REQUEST['time']);
} else {
    echo "Neivestas laikas";
}

class Radar
{
    public $dateOfEvent; //data ir laikas
    public $plateNumber; //automobilio numeris
    public $distance; //nuvaziuotas atstumas metrais
    public $time; //sugaistas laikas

    public function __construct(DateTime $dateOfEvent, string $plateNumber,float $distance,float $time){
        $this->dateOfEvent = $dateOfEvent;
        $this->plateNumber = $plateNumber;
        $this->distance = $distance;
        $this->time = $time;
    }

    public function getDistance() {
        return $this->distance;
    }

    public function getSpeed (){
        $distance = $this->distance;
        $time = $this->time;
        return round($speed = $distance / $time * 3.6, 1);
    }
}

function 

//$obj1 = new Radar (new DateTime($_REQUEST['dateOfEvent']), $_REQUEST['plateNumber'], $_REQUEST['distance'], $_REQUEST['time']); 

/*
$objArray = [
    new Radar(new DateTime('2017-01-01'), 'AAA111', (double)1000, (double)37),
    new Radar(new DateTime('2017-02-02'), 'BBB222', (double)4000, (double)110),
    new Radar(new DateTime('2017-03-03'), 'CCC333', (double)5000, (double)151),
    new Radar(new DateTime('2017-04-04'), 'DDD444', (double)6000, (double)155),
];

usort ($objArray, function ($a, $b) {
    return ($a->getSpeed() < $b->getSpeed()); 
});
*/
/*
foreach ($objArray as $radar) {
    echo "Uzfiksuoto automobilio valstybinis nr: " . $radar->number . ". Automobilis uzfiksuotas: "
     . $radar->date->format('Y-m-d'). ". Autombilio greitis : " . $radar->getSpeed() . "km/h";
    echo "<br>";
}
*/
?>