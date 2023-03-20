<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Intervention\Image\ImageManagerStatic as Image;

Image::canvas(200, 200, '#FFFFFF')
    ->rectangle(20, 20, 180, 180, function ($draw) {
        $draw->background('#ff0000');
        $draw->border(2,'#0000ff');
    })
    ->save('out/rectangle.jpg');