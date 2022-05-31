<?php

class config
{
	public $url;
	protected $version = "v3.4.0";
	protected $short_version = "v3";
	
	private $data = [];
	
	public function __construct(){
		$this->data['url'] = $this->env()->url;
		$this->data['version'] = $this->version;
		$this->data['short_version'] = $this->short_version;
	}
	
	public function set($key, $data){
		$this->data[$key] = $data;
	}
	
	public function debug(){
		echo "<pre>";
		print_r($this->data);
	}
	
	public function mjiinet(){
		require_once "../app/models/mjiinetwork.php";
		return new mjiinetwork();
	}
	
	public function add($url, $model){
		require_once "../app/" . $url . ".php";
	}
	
	public function show_files($url){
		$img = [];
		if ($handle = opendir($url)) {
			while (false !== ($entry = readdir($handle))) {
				if ($entry != "." && $entry != "..") {
					$img[] = $entry;
				}
			}
			closedir($handle);
		}
		return $img;
	}

	public function env(){
		$file = json_decode(file_get_contents('../.env'));
		return $file;
	}
	
	public function load(){
		return $this->data;
	}
}
