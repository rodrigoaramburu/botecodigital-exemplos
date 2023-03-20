<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Intervention\Image\ImageManagerStatic as Image;


$img = Image::make('images/castelo.jpg');

echo $img->width() . PHP_EOL;
echo $img->height() . PHP_EOL;
echo $img->mime() . PHP_EOL;