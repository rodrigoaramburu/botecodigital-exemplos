<?php 

require 'vendor/autoload.php';

use Intervention\Image\ImageManagerStatic as Image;

Image::make('images/castelo.jpg')
    ->blur(5)
    ->save('out/castelo-blur-5.jpg');