<?php

namespace Prioris\controller;

use Prioris\view\View;

class LoginController
{
    public static function renderLogin(){
        View::renderHtml("login.html");
        header('Location: http://mimi.prioris.com/');
    }
}
