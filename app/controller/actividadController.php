<?php

namespace App\Controller;

use App\Models\ActividadModel;


require_once MAIN_APP_ROUTE."../controller/baseController.php";
require_once MAIN_APP_ROUTE."../models/actividadModel.php";

class ActividadController extends BaseController{

    public function __construct(){
        $this->layout = "admin_layout";
    }

    public function index(){
        // echo "<br>CONTROLLER > RolController";
        // echo "<br>ACTION > index";
        // echo "<hr>";

        //se crea un objeto del modelo rol
        $objactividad = new ActividadModel();
        $actividad = $objactividad->getAll();
        // echo "<pre>";
        // print_r($roles);
        // echo "</pre>";

        // require_once MAIN_APP_ROUTE."../views/rols/viewRol.php";
        $data = [
            "actividades" => $actividad
        ];
        $this->render("actividad/viewActividad.php", $data);
    }

    public function new(){
        $this->render("actividad/newActividad.php");
    }

    public function create(){
        $nombre = $_POST["txtNombre"] ?? null;
        $descripcion = $_POST["txtDescripcion"] ?? null;
        if ($nombre) {
            $objActividad = new ActividadModel(null, $nombre, $descripcion);
            $res = $objActividad->save();
            if ($res) {
                header("Location: /actividad/index");

            }else{
                
                header("Location: /actividad/index");
            }
        }
    }

    public function view($id){
        $objOneActividad = new ActividadModel($id);
        $rol = $objOneActividad->getOneActividad();
       $data = [
           "id" => $rol[0]->id,
           "nombre" => $rol[0]->nombre,
           "descripcion" => $rol[0]->descripcion
       ];
         $this->render("actividad/viewOneActividad.php", $data);
    }

    public function editActividad($id)
    {
        $objActividad = new ActividadModel($id);
        $actividadInfo = $objActividad->getOneActividad();
        $data = [
            "actividad" => $actividadInfo[0]
        ];
        $this->render("actividad/editActividad.php", $data);
    }

    public function updateActividad()
    {// se edita como tal en la BD
        if (isset($_POST["txtId"])) {
            $id = $_POST['txtId'] ?? null;
            $nombre = $_POST['txtNombre'] ?? null;
            $descripcion = $_POST['txtDescripcion'] ?? null;
            $objRolEdit = new ActividadModel($id, $nombre, $descripcion);
            $res = $objRolEdit->editActividad();
            print_r($res);

            if ($res) {
                header("Location: /actividad/index");
            } else {
                echo "Error al editar la actividad";
            }
        }
        
    }

    public function deleteActividad($id)
    {
        $objActividad = new ActividadModel($id);
        $res = $objActividad->deleteActividad();

        if ($res) {
            header("Location: /actividad/index");
        } else {
            echo "Error al eliminar la actividad";
        }
    }
}