<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Intervention\Image\ImageManagerStatic as Image;

Image::configure(['driver'=>'imagick']);

$img = Image::make('images/castelo.jpg');

$mark = Image::canvas($img->width(), $img->height());
$mark->text('Boteco Digital', $img->width() -200 , $img->height() - 30, function($font){
    $font->file('fonts/Roboto-Medium.ttf');
    $font->size(24);
    $font->color('#FFF');
    $font->align('left');
    $font->valign('bottom');
});
$mark->opacity(30);

$img->insert($mark);
$img->save('out/watermark.png');