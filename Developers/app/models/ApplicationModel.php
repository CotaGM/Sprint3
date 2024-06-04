<?php
class ApplicationModel {
    
    protected $taskList;
    
    public function __construct(){
        $this->taskList = [];  
    }

    public function getTasks(){
        // obtener archivo json
        $jsonData = file_get_contents(__DIR__. "/dataBase.json");
<<<<<<< HEAD
        // convertir data json a php
        $this->taskList = json_decode($jsonData, true);
        return $this->taskList;
    }
=======
        //convertir data json a php
        $this -> taskList= json_decode($jsonData, true);
        $task = $this -> taskList;
        return $task;
        }
>>>>>>> f39479b9e15db60e6d7ac109b22b0c1ce78b6b27

    public function createTask(array $newTask){
        // Leer los datos existentes del archivo JSON
        $jsonData = file_get_contents(__DIR__. "/dataBase.json");
<<<<<<< HEAD
        $this->taskList = json_decode($jsonData, true);
=======
        $this -> taskList = json_decode($jsonData, true);
>>>>>>> f39479b9e15db60e6d7ac109b22b0c1ce78b6b27

        // Agregar el nuevo elemento al array de tareas
        $this->taskList[] = $newTask;

        // Convertir el array a formato JSON y guardar los datos en la base de datos
<<<<<<< HEAD
        $jsonData = json_encode($this->taskList, JSON_PRETTY_PRINT);
        file_put_contents(__DIR__ . "/dataBase.json", $jsonData);
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
        foreach ($taskList as &$task) {
            if ($task["nombre"] === $nombre) {
                // Actualizar la tarea con los datos nuevos
                $task = $updatedTask;
                
                // Convertir el array a formato JSON y guardar los datos en la base de datos
                $jsonData = json_encode($taskList, JSON_PRETTY_PRINT);
                file_put_contents(__DIR__ . "/dataBase.json", $jsonData);
                
                return true; 
            }
        }
        return false; 
    }

    public function deleteTask($nombre) {
        // Obtener la lista de tareas
        $taskList = $this->getTasks();
        
        // Buscar la tarea con el nombre especificado
        foreach ($taskList as $key => $task) {
            if ($task["nombre"] === $nombre) {
                // Eliminar la tarea del array de tareas
                unset($taskList[$key]);
                
                // Convertir el array a formato JSON y guardar los datos en la base de datos
                $jsonData = json_encode(array_values($taskList), JSON_PRETTY_PRINT);
                file_put_contents(__DIR__ . "/dataBase.json", $jsonData);
                
                return true; 
            }
        }
        return false; 
    }
}
=======
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

>>>>>>> f39479b9e15db60e6d7ac109b22b0c1ce78b6b27
