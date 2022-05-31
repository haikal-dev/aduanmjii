<?php

namespace Hotspot;

class RouterManagement
{
	protected $ip = "172.16.124.10";
	protected $port = "58310";
	protected $user = "aduanmjii";
	protected $pass = "gNBKSB5r9G0ytnab";
	
	protected $ros;
	public $response;
	
	public function __construct(){
		require_once "../app/models/RouterosAPI.php";
		$this->ros = new \RouterosAPI;
	}
	
	public function get_dhcp(){
		if($this->ros->connect($this->ip, $this->port, $this->user, $this->pass)){
			
			$comm = $this->ros->comm("/ip/dhcp-server/lease/print");
			$this->response = $comm;
			
			$this->ros->disconnect();
		}
	}
	
	public function get_user_detail2($userId){
		if($this->ros->connect($this->ip, $this->port, $this->user, $this->pass)){
			
			
			$this->ros->write("/tool/user-manager/user/print", false);
			$this->ros->write("?=username=" . $userId);
			$r = $this->ros->read();
			$this->response = $r;
			
			$this->ros->disconnect();
		}
	}
	
	public function get_user_detail($userIdArr){
		if($this->ros->connect($this->ip, $this->port, $this->user, $this->pass)){
			
			$arr = [];
			
			foreach($userIdArr as $v){
				$this->ros->write("/tool/user-manager/user/print", false);
				$this->ros->write("?=username=" . $v);
				$r = $this->ros->read();
				$firstname = (isset($r[0]['first-name'])) ? $r[0]['first-name'] : "";
				$lastname = (isset($r[0]['last-name'])) ? $r[0]['last-name'] : "";
				$arr[$v] = $firstname . " " . $lastname;
			}
			
			$this->response = $arr;
			
			$this->ros->disconnect();
		}
	}
	
	public function get_router_logs(){
		if($this->ros->connect($this->ip, $this->port, $this->user, $this->pass)){
			$arr = [];
			$comm = $this->ros->comm("/log/print");
			foreach($comm as $k => $c){
				if($c['topics'] == "hotspot,info,debug"){
					$arr[] = $c;
				}
				if($c['topics']  == "caps,info"){
					$arr[] = $c;
				}
			}
			
			$this->response = $arr;
			
			$this->ros->disconnect();
		}
	}
	
	public function active_users(){
		if($this->ros->connect($this->ip, $this->port, $this->user, $this->pass)){
			
			$comm = $this->ros->comm("/ip/hotspot/active/print");
			$this->response = $comm;
			
			$this->ros->disconnect();
		}
	}
	
	public function check_cpu(){
		if($this->ros->connect($this->ip, $this->port, $this->user, $this->pass)){
			
			$comm = $this->ros->comm("/system/resource/print");
			$this->response = $comm;
			
			$this->ros->disconnect();
		}
	}
}