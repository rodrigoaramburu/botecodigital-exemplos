<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Intervention\Image\ImageManagerStatic as Image;



Image::canvas(200, 200, '#FFFFFF')
    ->line(50, 100, 100, 150)
    ->line(100, 150, 150, 100)
    ->save('out/line.jpg');


Image::configure(['driver'=>'imagick']);
Image::canvas(200, 200, '#FFFFFF')
    ->line(10, 100, 190, 100, function($draw){
        $draw->width(5);
        $draw->color('#0000FF');
    })
    ->save('out/line-2.jpg');