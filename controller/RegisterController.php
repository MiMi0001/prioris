<?php

namespace Prioris\controller;

use Prioris\view\View;
use Prioris\model\Queryrepository as QR;

class RegisterController
{
    public static function renderRegister(){
        View::renderHtml("register.html");
    }

    public static function registerUser(){
        $username = $_POST["username"];
        $password = $_POST["password"];

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $userID = QR::getInstance()->saveUser($username, $hashedPassword);

        header('Location: http://mimi.prioris.com/');
        exit;
    }
}
