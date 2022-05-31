<?php

namespace MJII;

class IoTHMS
{
	
	protected $bw = 0;
	
	public function __construct(){
		
	}
	
	public function byteconverter(){
		require_once "../app/models/iothms/ByteConverter.php";
		return new \ByteConverter;
	}
	
	public function routeros(){
		require_once "../app/models/iothms/RouterManagement.php";
		return new \Hotspot\RouterManagement();
	}
	
	public function beautify($data, $t){
		$routeros = $this->routeros();
		$routeros->get_dhcp();
		$dhcp = $routeros->response;
		$users = $this->getUserDetailPerIds($data);
		
		if($t == 'activeUser'){
			$bw = $this->byteconverter();
			foreach($data as $k => $d){
				$c						= explode("-", $d['server']);
				$in 					= (isset($d['bytes-in'])) ? $d['bytes-in'] : 0;
				$out 					= (isset($d['bytes-out'])) ? $d['bytes-out'] : 0;
				$data[$k]['bw'] 		= $bw->formatted($in+$out);
				$data[$k]['ap']			= (isset($c[2])) ? strtoupper($c[2]) : "";
				$this->bw				+= $in+$out;
				$data[$k]['device']		= $this->identify_device($d['mac-address'], $dhcp);
				$data[$k]['name'] 	= strtoupper($users[$d['user']]);
			}
			return $data;
		}
	}
	
	public function getUserDetailPerIds($data){
		$routeros = $this->routeros();
		$arr = [];
		foreach($data as $d){
			$arr[] = $d['user'];
		}
		$routeros->get_user_detail($arr);
		return $routeros->response;
	}
	
	public function identify_device($mac, $dhcp){
		$name = "unnamed";
		foreach($dhcp as $d){
			if(isset($d['mac-address']) && $d['mac-address'] == $mac){
				if(isset($d['host-name'])){
					$name = $d['host-name'];
				}
			}
		}
		return $name;
	}
	
	public function show_bw(){
		$bw = $this->byteconverter();
		return $bw->formatted($this->bw);
	}
}