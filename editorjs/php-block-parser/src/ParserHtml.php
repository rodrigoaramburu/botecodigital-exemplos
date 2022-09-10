<?php 
declare(strict_types=1);

namespace ParserBlock;

use ParserBlock\Blocks\BlockParser;

class ParserHtml
{
    private array $blocksParse = [];

    public function addBlockParser(string $blockName, BlockParser $blockParser): void
    {
        $this->blocksParser[$blockName] = $blockParser;
    }

    public function parse(string $json): string
    {
        $data = json_decode($json, true);

        $content = '';
        foreach($data['blocks'] as $block){
            if(array_key_exists($block['type'], $this->blocksParser)){
                $parser = $this->blocksParser[ $block['type'] ];
                $content .= $parser->parse($block['data']);
            }
        }

        return $content;
    }
}
