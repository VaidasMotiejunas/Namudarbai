<?php

class Radar
{
    public $dateOfEvent; //data ir laikas
    public $plateNumber; //automobilio numeris
    public $distance; //nuvaziuotas atstumas metrais
    public $time; //sugaistas laikas

    public function __construct(string $plateNumber, string $dateOfEvent, float $distance,float $time){
        $this->dateOfEvent = $dateOfEvent;
        $this->plateNumber = $plateNumber;
        $this->distance = $distance;
        $this->time = $time;
    }

    public function getSpeed() {
        $distance = $this->distance;
        $time = $this->time;
        return round($speed = $distance / $time * 3.6, 1);
    }
}

//Neveikia
function sortEvents (array $array){
    usort ($array, function ($a, $b) {
        return ($a->getSpeed() < $b->getSpeed()); 
    });
}

?>