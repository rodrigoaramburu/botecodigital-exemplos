<?php 
declare(strict_types=1);

namespace ParserBlock\Blocks;

class ListParser implements BlockParser
{
    public function parse(array $data): string
    {
        $tag = $data['style'] == 'ordered' ? 'ol' : 'ul';
        $content = "<$tag>";
        $content .= array_reduce($data['items'], function($carry, $item, ){
            return $carry . "<li>$item</li>";
        },'');

        $content .= "</$tag>";
        
        
        return $content;
    }
}