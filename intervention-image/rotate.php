<?php 

require 'vendor/autoload.php';

use Intervention\Image\ImageManagerStatic as Image;

Image::make('images/castelo.jpg')
    ->rotate(45)
    ->save('out/castelo-rotate-45.jpg');