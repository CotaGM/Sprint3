<?php
class ApplicationModel {
    
    protected $tasks;
    



    public function __construct(){
        $this->tasks = [];
    
       
    }

    public function getTasks(){
        //obtener archivo json
        $jsonData = file_get_contents(__DIR__. "/dataBase.json");
        //convertir data json a php
        $this -> tasks = json_decode($jsonData, true);
        return $this -> tasks;
        }
    
    public function createTask(array $newTask){
        
        // Leer los datos existentes del archivo JSON
        $jsonData = file_get_contents(__DIR__. "/dataBase.json");
        $this -> tasks = json_decode($jsonData, true);

        // Agregar el nuevo elemento al array de tareas
        $this->tasks[] = $newTask;

        // Convertir el array a formato JSON y guardar los datos en la base de datos
        $jsonData  = json_encode($this->tasks, JSON_PRETTY_PRINT);
        file_put_contents(__DIR__ . "/dataBase.json", $jsonData );
    }
    
    public function updateTasks($name){
     foreach ($this->tasks as $task){
        if ($task -> name  === $task["nombre"]){
         $taskUpdate = $task;
        
        }
    }
       

    
    
    }



    public function readTasks(){

    }


    
    public function deleteTask(){
        // Implementar la lógica para eliminar una tarea
        echo "Tarea eliminada";
    }
}
?>
