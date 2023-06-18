<?php

namespace Prioris\view;

use JetBrains\PhpStorm\NoReturn;

class View
{
    public static function renderHtml($htmlFileName): void
    {
        $fullHtmlFileName = __DIR__ . "/../static/html/" . $htmlFileName;
        $htmlHeaderFileName = __DIR__."/../static/html/header.html";
        $htmlFooterFileName = __DIR__."/../static/html/footer.html";

        include $htmlHeaderFileName;
        include $fullHtmlFileName;
        include $htmlFooterFileName;
        exit();
    }
}
