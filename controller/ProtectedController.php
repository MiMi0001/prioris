<?php

namespace Prioris\controller;

use Prioris\view\View;

class ProtectedController
{
    public static function renderProtected(): void{
        View::renderHtml("protected.html");
    }
}
