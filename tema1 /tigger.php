<?php

class Tigger {
    private static $instance;
    private static $roar;
   
    private function __construct() {
            echo "Building character...<br>";
    }
    
    //metodo unico de instanciacion de objeto
    public static function getInstance(){
        if (self::$instance === null){             
            self::$instance = new Tigger();       
        }
        return self::$instance;
    }
    
    //metodo rugido
    public function getRoar(){
        echo "Grrr! <br>";
        $this->roar++;
    }

    //metodo contador de rugidos
    public function getCounter(): int{
       return $this->roar; 
    }
}
?>