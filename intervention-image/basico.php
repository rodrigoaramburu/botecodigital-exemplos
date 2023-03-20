<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Intervention\Image\ImageManager;

$manager = new ImageManager();
//$manager = new ImageManager(['driver' => 'imagick']);

$image = $manager->make('images/castelo.jpg');
$image->resize(300, 200);
$image->save('out/castelo.jpg');