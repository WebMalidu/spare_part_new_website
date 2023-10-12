<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

class UserAccess
{
    private $sessionVariable = "design_lab_user";

    public function isLoggedIn()
    {
        return isset($_SESSION[$this->sessionVariable]);
    }

    public function login($data)
    {
        $_SESSION[$this->sessionVariable] = $data;
    }

    public function logout()
    {
        unset($_SESSION[$this->sessionVariable]);
    }

    public function getUserData()
    {
        if ($this->isLoggedIn()) {
            return $_SESSION[$this->sessionVariable];
        }
        return null;
    }
}
