<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Intervention\Image\ImageManagerStatic as Image;


$img = Image::make('images/castelo.jpg');

$img->crop($img->width(), 100);
$img->save('out/castelo-crop.jpg');