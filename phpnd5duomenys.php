<?php

$zmones = [
    [
        'vardas' => 'Jonas',
        'lytis' => 'V',
    ],
    [
        'vardas' => 'Ona',
        'lytis' => 'M',
    ],
    [
        'vardas' => 'Petras',
        'lytis' => 'V',
    ],
    [
        'vardas' => 'Maryte',
        'lytis' => 'M',
    ],
    [
        'vardas' => 'Egle',
        'lytis' => 'M',
    ],
];

$mokiniai = [
    [
        'vardas' => 'Jonas',
        'pazymiai' => [
            'lietuviu' => [4, 8, 6, 7],
            'anglu' => [6, 7, 8],
            'matematika' => [3, 5, 4],
        ],
    ],
    [
        'vardas' => 'Ona',
        'pazymiai' => [
            'lietuviu' => [10, 9, 10],
            'anglu' => [9, 8, 10],
            'matematika' => [10, 10, 9, 9],
        ],
    ],  
    [
        'vardas' => 'Paulius',
        'pazymiai' => [
            'lietuviu' => [2, 5, 4, 6],
            'anglu' => [5, 6, 10, 3],
            'matematika' => [2, 2, 7, 9],
        ],
    ], 
    [
        'vardas' => 'Ana',
        'pazymiai' => [
            'lietuviu' => [10, 8, 4, 6],
            'anglu' => [10, 6, 10, 5],
            'matematika' => [7, 6, 9, 10],
        ],
    ], 
];

var_dump($zmones);
echo"<br>";
var_dump($mokiniai);
