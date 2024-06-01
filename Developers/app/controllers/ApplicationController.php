<?php
/**
 * Base controller for the application.
 * Add general things in this controller.
 */
class ApplicationController extends Controller {

    public function indexAction(){
        $task = new ApplicationModel();
		// buscar en el modelo los datos
        $taskList = $task -> getTasks();
        // devuelves a la vista
        $this -> view -> taskList = $taskList;
	}
    //CREATE
    public function createAction(){
        $task = new ApplicationModel();
        // recuperar datos del formulario
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $nombre = $_POST["nombre"];
            $descripcion= $_POST["descripcion"];
            $estado = $_POST["estado"];
            $vencimiento = $_POST["vencimiento"];

            //ingresar dentro del array
            $newTask = [
                "nombre" => $nombre,
                "descripcion" => $descripcion,
                "estado" => $estado,
                "vencimiento" => $vencimiento
            ];
            //llamada a metodo de Model
            $task->createTask($newTask);
        }  
    }
    //READ
    public function readAction() {
        $task = new ApplicationModel();
        $taskList = $task->getTasks();
    
        if (isset($_POST["nombre"])) {
            $nombre = $_POST["nombre"];
            $taskChosen = $task->readTask($nombre, $taskList);
            $this->view->taskChosen = $taskChosen;
    } 
  }
} 

