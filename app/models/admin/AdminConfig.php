<?php

class AdminConfig
{
    protected $data = [];

    private $username;
    private $password;
	public $locked = false;
    private $log = "../app/databases/admin.log";

    public function __construct($data){
        require_once "../app/models/config.php";
        $config = new config();
        $config = $config->load();

        $this->username = $this->env()->admin->user;
        $this->password = $this->env()->admin->pass;
        
        $this->data['url'] = $config['url'];
        $this->data['version'] = $config['version'];
        $this->data['short_version'] = $config['short_version'];

        foreach($data as $k => $v){
            $this->data[$k] = $v;
        }
    }

    public function env(){
		$file = json_decode(file_get_contents('../.env'));
		return $file;
	}

    public function debug(){
        echo "<pre>";
        print_r($this->data);
    }

    public function login($user, $pass){
        $ok = false;
		
		if($this->username == $user && $this->password == $pass){
			$ok = true;
		}

        return $ok;
    }

    public function update($text){
        if(!file_exists($this->log)){
            $fh = fopen($this->log, "w");
            fwrite($fh, gmdate('d/m/Y H:i', time() + (3600*8)) . ": " . $text);
            fclose($fh);
        }

        else {
            $fh = fopen($this->log, "a");
            fwrite($fh, "\n" . gmdate('d/m/Y H:i', time() + (3600*8)) . ": " . $text);
            fclose($fh);
        }
    }

    public function getLog(){
        if(!file_exists($this->log)){
            return "No data.";
        }

        else {
            $data = file_get_contents($this->log);
            return $data;
        }
    }

    public function load(){
        return $this->data;
    }
}