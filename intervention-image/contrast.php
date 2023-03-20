<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Intervention\Image\ImageManagerStatic as Image;


Image::make('images/castelo.jpg')
    ->contrast(35)
    ->save('out/castelo-contrast-35.jpg');

Image::make('images/castelo.jpg')
    ->contrast(-35)
    ->save('out/castelo-contrast--35.jpg');