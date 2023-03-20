<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Intervention\Image\ImageManagerStatic as Image;

Image::make('images/castelo.jpg')
            ->resize(100, 100)
            ->save('out/castelo-1.jpg');

Image::make('images/castelo.jpg')
            ->resize(100, null)
            ->save('out/castelo-2.jpg');

Image::make('images/castelo.jpg')
            ->resize(100, null, function($constraint){
                $constraint->aspectRatio();
            })
            ->save('out/castelo-3.jpg');


Image::make('images/castelo.jpg')
            ->widen(200)
            ->save('out/castelo-widen.jpg');

Image::make('images/castelo.jpg')
            ->heighten(200)
            ->save('out/castelo-heighten.jpg');