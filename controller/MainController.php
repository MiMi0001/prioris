<?php

namespace Prioris\controller;

use Prioris\view\View;

class MainController
{
    public static function renderMain(){
        View::renderHtml("main.html");
    }
}
