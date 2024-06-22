<?php

function convertMarkdownToHtml($markdown)
{
    // Muat Parsedown secara langsung tanpa pernyataan use
    $parsedown = new \Parsedown();
    return $parsedown->text($markdown);
}


// function convertMarkdownToHtmlWithoutParagraph($markdown)
// {
//     $parsedown = new Parsedown();
//     return new HtmlString($parsedown->line($markdown));
// }
