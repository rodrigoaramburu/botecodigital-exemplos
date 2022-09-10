<?php 
declare(strict_types=1);

namespace ParserBlock\Blocks;

class HeaderParser implements BlockParser
{
    public function parse(array $data): string
    {
        $level = $data['level'];
        $text = $data['text'];
        return "<h$level>$text</h$level>";
    }
}