<?php

class API_Request
{
	// protected property
	protected $url 			= '';
	protected $method;
	protected $httpheader	= [];
	protected $data			= [];

	// public property
	public $json_enable		= false;
	
	public function add($url, $method, $httpheader){
		$this->url = $url;
		
		if($method == 'GET'){
			$this->method = false;
		}
		elseif($method == 'POST'){
			$this->method = true;
		}
		
		$this->httpheader = $httpheader;
	}
	
	public function params($data){
		$this->data = $data;
	}
	
	public function request(){
		$url = $this->url;		
		
		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_POST, $this->method);
		if(count($this->data) > 0){
			if($this->json_enable){
				$this->data = json_encode($this->data);
			}
			curl_setopt($curl, CURLOPT_POSTFIELDS, $this->data);
		}
		curl_setopt($curl, CURLOPT_HTTPHEADER, $this->httpheader);
		$response = curl_exec($curl);
		curl_close($curl);
		return $response;
	}
}