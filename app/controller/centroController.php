<?php

namespace App\Controller;

use App\Models\CentroModel;


require_once MAIN_APP_ROUTE."../controller/baseController.php";
require_once MAIN_APP_ROUTE."../models/centroModel.php";

class CentroController extends BaseController{

    public function __construct(){
        $this->layout = "admin_layout";
    }

    public function index(){
        // echo "<br>CONTROLLER > RolController";
        // echo "<br>ACTION > index";
        // echo "<hr>";

        //se crea un objeto del modelo rol
        $objcentro = new CentroModel();
        $centro = $objcentro->getAll();
        // echo "<pre>";
        // print_r($roles);
        // echo "</pre>";

        // require_once MAIN_APP_ROUTE."../views/rols/viewRol.php";
        $data = [
            "centros" => $centro
        ];
        $this->render("centro/viewCentro.php", $data);
    }

    public function new(){
        $this->render("centro/newCentro.php");
    }

    public function create(){
        $nombre = $_POST["txtNombre"] ?? null;
        if ($nombre) {
            $objCentro = new CentroModel(null, $nombre);
            $res = $objCentro->save();
            if ($res) {
                header("Location: /centro/index");

            }else{
                
                header("Location: /centro/index");
            }
        }
    }

    public function view($id){
        $objOneCentro = new CentroModel($id);
        $centro = $objOneCentro->getOneCentro();
       $data = [
           "id" => $centro[0]->id,
           "nombre" => $centro[0]->nombre
       ];
         $this->render("centro/viewOneCentro.php", $data);
    }

    public function editCentro($id)
    {
        $objCentro = new CentroModel($id);
        $centroInfo = $objCentro->getOneCentro();
        $data = [
            "centro" => $centroInfo[0]
        ];
        $this->render("centro/editCentro.php", $data);
    }

    public function updateCentro()
    {// se edita como tal en la BD
        if (isset($_POST["txtId"])) {
            $id = $_POST['txtId'] ?? null;
            $nombre = $_POST['txtNombre'] ?? null;
            $objCentroEdit = new CentroModel($id, $nombre);
            $res = $objCentroEdit->editCentro();

            if ($res) {
                header("Location: /centro/index");
            } else {
                echo "Error al editar el centro";
            }
        }
        
    }

    public function deleteCentro($id)
    {
        $objCentro = new CentroModel($id);
        $res = $objCentro->deleteCentro();

        if ($res) {
            header("Location: /centro/index");
        } else {
            echo "Error al eliminar el centro";
        }
    }
}