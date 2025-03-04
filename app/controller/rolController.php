<?php

namespace App\Controller;
use App\Models\RolModel;

require_once MAIN_APP_ROUTE."../controller/baseController.php";
require_once MAIN_APP_ROUTE."../models/rolModel.php";

class RolController extends BaseController{

    public function __construct()
    {
        $this->layout = "admin_layout";
    }
    public function index(){
        // echo "<br>CONTROLLER > RolController";
        // echo "<br>ACTION > index";
        // echo "<hr>";

        //se crea un objeto del modelo rol
        $objRol = new RolModel();
        $roles = $objRol->getAll();
        // echo "<pre>";
        // print_r($roles);
        // echo "</pre>";

        // require_once MAIN_APP_ROUTE."../views/rols/viewRol.php";
        $data = [
            "roles" => $roles
        ];
        $this->render("rols/viewRol.php", $data);
    }

    //Muestra el formulario para crear un nuevo rol
    public function new(){
        $this->render("rols/newRol.php");
    }

    //guarda los datos del formulario
    public function create(){
        $nombre = $_POST["txtNombre"] ?? null;
        if ($nombre) {
            $objRol = new RolModel(null, $nombre);
            $res = $objRol->save();
            if ($res) {
                header("Location: /rol/index");

            }else{
                
                header("Location: /rol/index");
            }
        }
    }

    public function view($id){
        $objOneRol = new RolModel($id);
        $rol = $objOneRol->getOneRol();
       $data = [
           "id" => $rol[0]->id,
           "nombre" => $rol[0]->nombre
       ];
         $this->render("rols/viewOneRol.php", $data);
    }

    public function editRol($id)
    {
        $objRol = new RolModel($id);
        $rolInfo = $objRol->getOneRol();
        $data = [
            "infoReal" => $rolInfo[0]
        ];
        $this->render("rols/editRol.php", $data);
    }
    public function updateRol()
    {// se edita como tal en la BD
        if (isset($_POST["txtId"])) {
            $id = $_POST['txtId'] ?? null;
            $nombre = $_POST['txtNombre'] ?? null;
            $objRolEdit = new RolModel($id, $nombre);
            $res = $objRolEdit->editRol();
            print_r($res);

            if ($res) {
                header("Location: /rol/index");
            } else {
                echo "Error al editar el rol";
            }
        }
        
    }
    
    public function deleteRol($id)
    {
        $objRol = new RolModel($id);
        $res = $objRol->deleteRol();

        if ($res) {
            header("Location: /rol/index");
        } else {
            echo "Error al eliminar el rol";
        }
    }

    
}