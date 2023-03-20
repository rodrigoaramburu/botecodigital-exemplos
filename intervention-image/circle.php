<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Intervention\Image\ImageManagerStatic as Image;

Image::canvas(200, 200, '#FFFFFF')
    ->circle(50, 100, 100, function($draw){
        $draw->background('#00FF00');
        $draw->border(2, '#555500');
    })
    ->save('out/circle-1.jpg');