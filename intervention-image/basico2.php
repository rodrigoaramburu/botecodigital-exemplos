<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Intervention\Image\ImageManagerStatic as Image;

Image::configure(['driver' => 'gd']);

$image = Image::make('images/castelo.jpg')
            ->resize(300, 200)
            ->save('out/castelo.jpg');