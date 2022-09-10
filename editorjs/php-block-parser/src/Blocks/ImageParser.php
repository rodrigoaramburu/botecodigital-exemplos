<?php 
declare(strict_types=1);

namespace ParserBlock\Blocks;

class ImageParser implements BlockParser
{
    public function parse(array $data): string
    {
        $url = $data['file']['url'];
        $caption = $data['caption'];
        return <<<"IMG"
            <figure>
                <img src="$url">
                <figcaption>$caption</figcaption>
            </figure>
        IMG;
    }
}