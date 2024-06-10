<?php 

class Person{
    public $items;

    public function __construct(){
      $this -> items =[]; 
    }

    public function getOutHome(){
      echo "Lista de cosas para llevar al salir de casa: <br>";
      foreach($this->items as $item){
      echo $item. "<br>";
      }
        
    }
}
?>