<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Intervention\Image\ImageManagerStatic as Image;


Image::make('images/castelo.jpg')
    ->colorize(100, 0 , 0)
    ->save('out/castelo-colorize-red.jpg');

Image::make('images/castelo.jpg')
    ->colorize(-100, 0 , 0)
    ->save('out/castelo-colorize-without-red.jpg');
