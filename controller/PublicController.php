<?php

namespace Prioris\controller;

use Prioris\view\View;

class PublicController
{
    public static function renderPublic(){
        View::renderHtml("public.html");
    }
}
