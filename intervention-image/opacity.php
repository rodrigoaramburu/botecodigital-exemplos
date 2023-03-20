<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Intervention\Image\ImageManagerStatic as Image;

Image::configure(['driver'=>'imagick']);

Image::make('images/castelo.jpg')
    ->opacity(50)
    ->save('out/opacity.png');
