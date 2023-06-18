<?php

namespace Prioris;

use Prioris\controller\PublicController;
use Prioris\AuthMiddleware as Auth;
use Prioris\controller\RegisterController;
use Prioris\controller\ProtectedController;
use Prioris\controller\MainController;
use Prioris\controller\UsersListController;
use Prioris\controller\LoginController;

class Prioris
{
    public static function resolveURI()
    {
        $uri = $_SERVER["REQUEST_URI"];
        switch ($uri) {
            case "/":
                Auth::authenticate([MainController::class, "renderMain"], false);
                break;
            case "/public":
                Auth::authenticate([PublicController::class, "renderPublic"], false);
                break;
            case "/register":
                Auth::authenticate([RegisterController::class, "renderRegister"], false);
                break;
            case "/users-list":
                Auth::authenticate([UsersListController::class, "renderUsersList"],true);
                break;
            case "/login":
                Auth::authenticate([LoginController::class, "renderLogin"], true);
            case "/api/register":
                Auth::authenticate([RegisterController::class, "registerUser"], false);
                break;
            case "/api/user/all":
                Auth::authenticate([UsersListController::class, "getUsers"], true);
                break;
            case "/protected":
                Auth::authenticate([ProtectedController::class, "renderProtected"], true);
                break;
            default:
                echo "Route not found! ( $uri )";
                exit;
        }
    }
}

Prioris::resolveURI();
