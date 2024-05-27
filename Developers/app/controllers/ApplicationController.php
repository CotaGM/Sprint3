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
        // buscar en el modelo los datos
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        $name = $_POST["nombre"];
        $description = $_POST["descripcion"];
        $state = $_POST["estado"];
        $dueDate= $_POST["fecha Tope"];

        $newTask = [
            'nombre' => $name,
            'descripcion' => $description,
            'estado' => $state,
            'fecha Tope' => $dueDate
        ];
        $task->createTask($newTask);
        }
        // devuelves a la vista
        $this->view->message = "hello this will the list of create creatfdfsdafadsfadsafae";
    }
}