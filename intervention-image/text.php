<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Intervention\Image\Gd\Font;
use Intervention\Image\ImageManagerStatic as Image;


Image::canvas(200, 100, '#FFFFFF')
    ->text("Boteco Digital", 0 , 0)
    ->save('out/text-1.jpg');

$img = Image::canvas(200, 200, '#FFFFFF');
$img->text('Boteco Digital', $img->width() / 2, $img->height() /2, function(Font $font) {
        $font->file('fonts/Roboto-Medium.ttf');
        $font->size(24);
        $font->color('#FF00');
        $font->align('center');
        $font->valign('top');
        $font->angle(45);
    })
    ->save('out/text-2.jpg');