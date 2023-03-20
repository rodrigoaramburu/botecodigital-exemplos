<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Intervention\Image\ImageManagerStatic as Image;


$img = Image::make('images/castelo.jpg');

$img->fit(200, 100);
$img->save('out/castelo-fit-1.jpg');

$img->fit(200, 200, function ($constraint) {
    $constraint->upsize();
}, 'bottom-right');
$img->save('out/castelo-fit-2.jpg');