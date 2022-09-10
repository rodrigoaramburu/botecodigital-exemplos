<?php

declare(strict_types=1);

require './vendor/autoload.php';

use ParserBlock\ParserHtml;
use ParserBlock\Blocks\ListParser;
use ParserBlock\Blocks\ImageParser;
use ParserBlock\Blocks\HeaderParser;
use ParserBlock\Blocks\ParagraphParser;
use ParserBlock\Blocks\BlockquoteParser;


$parser = new ParserHtml();
$parser->addBlockParser('header', new HeaderParser());
$parser->addBlockParser('paragraph', new ParagraphParser());
$parser->addBlockParser('list', new ListParser());
$parser->addBlockParser('image', new ImageParser());
$parser->addBlockParser('blockquote', new BlockquoteParser());

$json = file_get_contents('content.json');

$content = $parser->parse($json);

echo $content;

