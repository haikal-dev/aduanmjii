<?php

class AdminModel
{
    public $data = [];

    // initialize sessions
    public function __construct(){

    }

    public function session(){
        require_once "../app/models/admin/AdminSession.php";
        return new AdminSession();
    }

    public function redirect($url){
        header("location: " . $url);
    }

    public function issue(){
        require_once "../app/models/IssueModel.php";
        return new IssueModel();
    }

    public function announcement(){
        require_once "../app/models/Announcement.php";
        return new \haikal\Announcement();
    }

    public function config(){
        require_once "../app/models/admin/AdminConfig.php";
        return new AdminConfig($this->data);
    }
}