<?php
class ApplicationModel {
    
    protected $taskList;
    
    public function __construct(){
        $this->taskList = [];  
    }

    public function getTasks(){
        //obtener archivo json
        $jsonData = file_get_contents(__DIR__. "/dataBase.json");
        //convertir data json a php
        $this -> taskList= json_decode($jsonData, true);
        $task = $this -> taskList;
        return $task;
        }

    public function createTask(array $newTask){
        
        // Leer los datos existentes del archivo JSON
        $jsonData = file_get_contents(__DIR__. "/dataBase.json");
        $this -> taskList = json_decode($jsonData, true);

        // Agregar el nuevo elemento al array de tareas
        $this->taskList[] = $newTask;

        // Convertir el array a formato JSON y guardar los datos en la base de datos
        $jsonData  = json_encode($this->taskList, JSON_PRETTY_PRINT);
        file_put_contents(__DIR__ . "/dataBase.json", $jsonData );
    }

    public function readTask($nombre, $taskList) {
        foreach ($taskList as $task) {
            if ($task["nombre"] === $nombre) {
                return $task;
            }
        } 
    }
    public function updateTask($nombre, $updatedTask) {
        // Obtener la lista de tareas
        $taskList = $this->getTasks();
        
        // Buscar la tarea con el nombre especificado
        foreach ($taskList as $task) {
            if ($task["nombre"] === $nombre) {
                // Actualizar la tarea con los datos nuevos
                $task = $updatedTask;
                
                // Convertir el array a formato JSON y guardar los datos en la base de datos
                $jsonData  = json_encode($taskList, JSON_PRETTY_PRINT);
                file_put_contents(__DIR__ . "/dataBase.json", $jsonData);
                
                return true; 
            }
        }
        return false; 
    }
    

    public function deleteTask(){
        // Implementar la lógica para eliminar una tarea
        echo "Tarea eliminada";
    }
}

