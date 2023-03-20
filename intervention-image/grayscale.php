<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Intervention\Image\ImageManagerStatic as Image;


$img = Image::make('images/castelo.jpg')
    ->greyscale()
    ->save('out/castelo-grayscale.jpg');