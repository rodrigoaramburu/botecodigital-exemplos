<?php 
declare(strict_types=1);

namespace ParserBlock\Blocks;

class ParagraphParser implements BlockParser
{
    public function parse(array $data): string
    {
        $text = $data['text'];
        return "<p>$text</p>";
    }
}