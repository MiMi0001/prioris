<?php

namespace Prioris\controller;

use Prioris\view\View;
use Prioris\model\Queryrepository as QR;

class UsersListController
{
    public static function renerusersList(){
        View::renderHtml("users_list.html");
    }

    public static function getUsers(){
        $users=QR::getInstance()->getAllusers();
        http_response_code(200);
        echo json_encode($users);
    }
}
