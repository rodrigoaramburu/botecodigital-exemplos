<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Intervention\Image\ImageManagerStatic as Image;


//encode
$jpg = (string) Image::make('images/castelo.jpg')->encode('jpg', 75);
file_put_contents('out/jpg-image.jpg', $jpg);

$png = (string) Image::make('images/castelo.jpg')->encode('png');
file_put_contents('out/png-image.png', $png);

$webp = (string) Image::make('images/castelo.jpg')->encode('webp');
file_put_contents('out/webp-image.webp', $webp);

// save
Image::make('images/castelo.jpg')->save('out/save-image.png');
Image::make('images/castelo.jpg')->save('out/sem-formato-image');