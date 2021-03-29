<?php
    class MyGreeter{

    public static $instance = null;

    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }

        return static::$instance;
    }

    public function __construct()
    {
        $this->getGreeting();
    }

    public function __clone()
    {
    }

    public function getGreeting(){
        $hour=$this->getTime();
        if ($hour>= 6 && $hour < 12){
            return "Good morning";
        }elseif($hour >= 12 && $hour < 18){
            return "Good afternoon";
        }else{
            return "Good evening";
        }
    }

    private function getTime(){
        date_default_timezone_set('PRC');
	    return date("H",time());
    }
}

$MyGreeter=MyGreeter::getInstance();
echo $MyGreeter->getGreeting();