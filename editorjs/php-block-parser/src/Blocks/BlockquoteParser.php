<?php 
declare(strict_types=1);

namespace ParserBlock\Blocks;

class BlockquoteParser implements BlockParser
{
    public function parse(array $data): string
    {
        $cite = $data['cite'];
        $blockquote = $data['blockquote'];
        return <<<"BLOCKQUOTE"
            <figure>
                <blockquote>$blockquote</blockquote>
                <figcaption><cite>$cite</cite></figcaption>
            </figure>
        BLOCKQUOTE;
    }
}