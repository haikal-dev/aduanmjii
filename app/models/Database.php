<?php

class Database
{	
	public function connect($dbname){
		$url = $this->env()->database->url;
		$user = $this->env()->database->user;
		$pass = $this->env()->database->pass;

		$con = new mysqli($url, $user, $pass, $dbname);
		return $con;
	}

	public function env(){
		$file = json_decode(file_get_contents('../.env'));
		return $file;
	}
}