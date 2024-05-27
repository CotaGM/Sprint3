<?php
class ApplicationModel extends Model{
    
    protected array $tasks;
    
    public function __construct(){
       $this -> tasks = []; 
    }
    
    public function getTasks(){
    //obtener archivo json
    $jsonData = file_get_contents(__DIR__. "/dataBase.json");
    //convertir data json a php
    $this -> tasks = json_decode($jsonData, true);
    return $this -> tasks;
    }
    
    public function createTask(array $newTask){
        $this->tasks[] = $newTask;
        $jsonData = json_encode($this->tasks, JSON_PRETTY_PRINT);
        file_put_contents($jsonData, $jsonData);
    }

    public function deleteTask(){
      echo "Rama creada";

    }

}
?>