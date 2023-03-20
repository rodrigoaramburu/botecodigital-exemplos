<?php 
declare(strict_types=1);

require 'vendor/autoload.php'; 

use Intervention\Image\ImageManagerStatic as Image;


$img = Image::canvas(600,400, '#000066');

$img->save('out/canvas.png');