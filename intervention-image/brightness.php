<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Intervention\Image\ImageManagerStatic as Image;


Image::make('images/castelo.jpg')
    ->brightness(35)
    ->save('out/castelo-brightness-35.jpg');

Image::make('images/castelo.jpg')
    ->brightness(-35)
    ->save('out/castelo-brightness--35.jpg');