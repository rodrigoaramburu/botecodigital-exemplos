<?php 
declare(strict_types=1);
namespace ParserBlock\Blocks;

interface BlockParser
{
    public function parse(array $data): string;
}
