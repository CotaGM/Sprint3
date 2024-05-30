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

    public function createAction(){
        $task = new ApplicationModel();
        // recuperar datos del formulario
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        $name = $_POST["nombre"];
        $description = $_POST["descripcion"];
        $state = $_POST["estado"];
        $dueDate = $_POST["vencimiento"];

        //ingresar dentro del array
        $newTask = [
            "nombre" => $name,
            "descripcion" => $description,
            "estado" => $state,
            "vencimiento" => $dueDate
        ];
        //llamada a metodo de Model
        $task->createTask($newTask);
        }
        // devuelves a la vista   
    }

    /*public function updateAction(){
        $task = new ApplicationModel();

        //llamada al modelo


        //devuelve a la vista


    }*/
}