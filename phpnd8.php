<?php
class Radar
{
    public $date; //data ir laikas
    public $number; //automobilio numeris
    public $distance; //nuvaziuotas atstumas metrais
    public $time; //sugaistas laikas

    public function __construct(DateTime $date, string $number,float $distance,float $time){
        $this->date = $date;
        $this->number = $number;
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

$objArray = [
    new Radar(new DateTime('2017-01-01'), 'AAA111', (double)1000, (double)37),
    new Radar(new DateTime('2017-02-02'), 'BBB222', (double)4000, (double)110),
    new Radar(new DateTime('2017-03-03'), 'CCC333', (double)5000, (double)151),
    new Radar(new DateTime('2017-04-04'), 'DDD444', (double)6000, (double)155),
];

usort ($objArray, function ($a, $b) {
    return ($a->getSpeed() < $b->getSpeed()); 
});


foreach ($objArray as $radar) {
    echo "Uzfiksuoto automobilio valstybinis nr: " . $radar->number . ". Automobilis uzfiksuotas: "
     . $radar->date->format('Y-m-d'). ". Autombilio greitis : " . $radar->getSpeed() . "km/h";
    echo "<br>";
}
