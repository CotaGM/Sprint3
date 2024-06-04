<?php
class ApplicationController extends Controller {

    public function indexAction() {
        $task = new ApplicationModel();
        // buscar en el modelo los datos
        $taskList = $task->getTasks();
        // devuelves a la vista
        $this->view->taskList = $taskList;
    }

    // CREATE
    public function createAction() {
        $task = new ApplicationModel();
        // recuperar datos del formulario
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $nombre = $_POST["nombre"];
            $descripcion = $_POST["descripcion"];
            $estado = $_POST["estado"];
            $vencimiento = $_POST["vencimiento"];

            // ingresar dentro del array
            $newTask = [
                "nombre" => $nombre,
                "descripcion" => $descripcion,
                "estado" => $estado,
                "vencimiento" => $vencimiento
            ];
            // llamada a método de Model
            $task->createTask($newTask);
            //redirigir a la pagina index
            header("Location: ./");
            exit();
        }
    }

    // READ
    public function readAction() {
        $task = new ApplicationModel();
        $taskList = $task->getTasks();

        if (isset($_POST["nombre"])) {
            $nombre = $_POST["nombre"];
            $taskChosen = $task->readTask($nombre, $taskList);
            $this->view->taskChosen = $taskChosen;
        }
    }

    // UPDATE
    public function updateAction() {
        $task = new ApplicationModel();
        $taskList = $task->getTasks();

        if (isset($_POST["nombre"])) {
            $nombre = $_POST["nombre"];
            $taskChosen = $task->readTask($nombre, $taskList);
            $this->view->taskChosen = $taskChosen;
        }

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $nombre = $_POST["nombre"] ?? null;
            $descripcion = $_POST["descripcion"] ?? null;
            $estado = $_POST["estado"] ?? null;
            $vencimiento = $_POST["vencimiento"] ?? null;
    
            if ($nombre && $descripcion && $estado && $vencimiento) {
                $updatedTask = [
                    "nombre" => $nombre,
                    "descripcion" => $descripcion,
                    "estado" => $estado,
                    "vencimiento" => $vencimiento
                ];
    
                $updated = $task->updateTask($nombre, $updatedTask);
    
                if ($updated) {
                    header("Location: ./");
                    exit();
                }
            }
        } else {
            if (isset($_POST["nombre"])) {
                $nombre = $_POST["nombre"];
                $taskChosen = $task->readTask($nombre, $taskList);
                $this->view->taskChosen = $taskChosen;
            }
        }
    }
    
    // DELETE
    /*public function deleteAction() {
        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["nombre"])) {
            $nombre = $_POST["nombre"];
            $taskModel = new ApplicationModel();
            $deleted = $taskModel->deleteTask($nombre);

            if ($deleted) {
                header("Location: ./");
                exit();
            }
        }
    }*/
}