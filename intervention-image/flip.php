<?php 

require 'vendor/autoload.php';

use Intervention\Image\ImageManagerStatic as Image;

Image::make('images/castelo.jpg')
    ->flip('v')
    ->save('out/castelo-flip-v.jpg');

Image::make('images/castelo.jpg')
    ->flip('h')
    ->save('out/castelo-flip-h.jpg');
