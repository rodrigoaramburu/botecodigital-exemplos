<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Intervention\Image\ImageManagerStatic as Image;

Image::configure(['driver'=>'imagick']);

$points = [
    40,  50,  
    20,  240, 
    60,  60,  
    240, 20,  
    50,  40,  
    10,  10   
];

Image::canvas(300, 300, '#FFFFFF')
    ->polygon($points, function ($draw) {
        $draw->background('#0000ff');
        $draw->border(1, '#ff0000');
    })
    ->save('out/polygon.jpg');