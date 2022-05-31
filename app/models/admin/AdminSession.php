<?php

class AdminSession
{
    protected $sessionName = "MJIIUSER_ADMIN_SESSION";

    public function __construct(){
        
    }

    public function exists(){
        return (isset($_SESSION[$this->sessionName])) ? true : false;
    }

    public function register(){
        $_SESSION[$this->sessionName] = "AduanMJII_Admin";
    }

    public function destroy(){
        session_unset();
        session_destroy();
    }
}