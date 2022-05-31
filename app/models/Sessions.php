<?php

class Sessions
{
	protected $session_id;
	protected $session_value;
	
	public function __construct(){
		
	}
	
	public function get($session_id){
		return $_SESSION[$session_id];
	}
	
	public function set($session_id, $session_value){
		$_SESSION[$session_id] = $session_value;
	}
	
	public function remove($session_id){
		unset($_SESSION[$session_id]);
	}
	
	public function exists($session_id){
		$done = false;
		if(isset($_SESSION[$session_id])){
			$done = true;
		}
		return $done;
	}
	
	public function validate($session_input, $session_id){
		$done = false;
		if($this->exists($session_id)){
			if($this->get($session_id) == $session_input){
				$done = true;
			}
		}
		
		return $done;
	}
}