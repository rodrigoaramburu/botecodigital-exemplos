<?php 

require 'vendor/autoload.php';

use Intervention\Image\ImageManagerStatic as Image;

$img = Image::make('images/castelo.jpg');

// cria uma imagem de um circulo com fundo transparente e preenchimento branco
$mask = Image::canvas($img->width(), $img->height());
$mask->circle($img->height(), $img->width() / 2, $img->height() / 2, function ($draw) {
    $draw->background('#fff');
});

$img->mask($mask);
$img->save('out/castelo_mask.png');