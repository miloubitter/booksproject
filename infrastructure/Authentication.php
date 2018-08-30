<?php

namespace Infrastructure;


class Authentication
{
    public static function login(string $username, string $password) : bool
    {
        if($username === 'milou' && $password === 'milou'){
            $_SESSION['profile'] = array(
                'userId' => 1,
                'userName' => 'milou',
                'userFullName' => 'Milou Bitter'
            );
            return true;
        }
        return false;
    }

    public static function logout(){
        session_destroy();
    }

    public static function isLoggedIn(){
        return isset($_SESSION['profile']);
    }

    public static function getProfile(){
        return $_SESSION['profile'] ?? null;
    }
}