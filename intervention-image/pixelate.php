<?php 

require 'vendor/autoload.php';

use Intervention\Image\ImageManagerStatic as Image;

Image::make('images/castelo.jpg')
    ->pixelate(5)
    ->save('out/castelo-pixelate-5.jpg');