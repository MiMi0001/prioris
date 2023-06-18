<?php

namespace Prioris;

use Prioris\model\Queryrepository as QR;

// Class to authenticate user, with HTTP Basic authentication
class AuthMiddleware
{
    public static function authenticate($callback, bool $protected)
    {
        // If the route is protected, we have to authenticate the user
        if ($protected) {
            // If username is not provided in the request's header, we prompt the browser's login pop-up
            if (!isset($_SERVER["PHP_AUTH_USER"])) {
                header('WWW-Authenticate: Basic realm="Prioris"');
                http_response_code(401);
                echo "Please login!";
                exit;
            // If username is provided
            } else {
                $username = $_SERVER["PHP_AUTH_USER"];
                $password = $_SERVER["PHP_AUTH_PW"];
                $hashedPassword = QR::getInstance()->getUserPassword($username);
                // Verify the provided password, if not registered or incorrect, we prompt the browsers login pop-up
                if (!password_verify($password, $hashedPassword)) {
                    http_response_code(401);
                    header('WWW-Authenticate: Basic realm="Prioris"');
                    echo "Invalid login!";
                    exit;
                // if the password is correct, store the username in session and we call the callback function.
                } else {
                    session_start();
                    $_SESSION["username"]=$username;
                    call_user_func($callback);
                }
            }
        // If the route is not protected, authentication is not necessary, so we call the callback.
        } else call_user_func($callback);
    }
}
