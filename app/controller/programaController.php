<?php

namespace App\Controller;

use App\Models\CentroModel;
use App\Models\ProgramaModel;


require_once MAIN_APP_ROUTE."../controller/baseController.php";
require_once MAIN_APP_ROUTE."../models/programaModel.php";



class ProgramaController extends BaseController{

    public function __construct(){
        $this->layout = "dashboard_layout";
    }

    public function index(){
        // echo "<br>CONTROLLER > RolController";
        // echo "<br>ACTION > index";
        // echo "<hr>";

        //se crea un objeto del modelo rol
        $objPrograma = new ProgramaModel();
        $programas = $objPrograma->getAll();
        // echo "<pre>";
        // print_r($roles);
        // echo "</pre>";

        // require_once MAIN_APP_ROUTE."../views/rols/viewRol.php";
        $data = [
            "programas" => $programas
        ];
        $this->render("programa/viewPrograma.php", $data);
    }

    public function viewAll(){
        $objPrograma = new ProgramaModel();
        $programas = $objPrograma->getAllPrograma();
        $data = [
            "programas" => $programas
        ];
        $this->render("programa/viewPrograma.php", $data);
    }

    public function new(){
        $objCentros = new CentroModel();
        $centros = $objCentros->getAll();
    
       $data = [
           "centros" => $centros
       ];
        $this->render("programa/newPrograma.php", $data);
    }

    public function create(){
        $codigo = $_POST["txtCodigo"] ?? null;
        $nombre = $_POST["txtNombre"] ?? null;
        $centro = $_POST["txtCentro"] ?? null;
        if ($nombre && $codigo && $centro) {
            $objPrograma = new ProgramaModel(null, $codigo, $nombre, $centro);
            $res = $objPrograma->save();
            if ($res) {
                header("Location: /programa/index");

            }else{
                
                header("Location: /programa/index");
            }
        }
    }

    public function editPrograma($id)
    {
        $objPrograma = new ProgramaModel($id);
        $programaInfo = $objPrograma->getOneRol();
        $objCentros = new CentroModel();
        $centros = $objCentros->getAll();
        $data = [
            "infoReal" => $programaInfo[0],
            "centros" => $centros
        ];
        $this->render("programa/editPrograma.php", $data);
    }

    public function updatePrograma()
    {// se edita como tal en la BD
        if (isset($_POST["txtId"])) {
            $id = $_POST['txtId'] ?? null;
            $codigo = $_POST['txtCodigo'] ?? null;
            $nombre = $_POST['txtNombre'] ?? null;
            $centro = $_POST['txtCentro'] ?? null;
            $objProgramaEdit = new ProgramaModel($id, $codigo, $nombre, $centro);
            $res = $objProgramaEdit->editPrograma();
            print_r($res);

            if ($res) {
                header("Location: /programa/index");
            } else {
                echo "Error al editar el programa";
            }
        }
        
    }

    public function deletePrograma($id)
    {
        $objPrograma = new ProgramaModel($id);
        $res = $objPrograma->deletePrograma();

        if ($res) {
            header("Location: /programa/index");
        } else {
            echo "Error al eliminar el programa";
        }
    }

    public function view($id){
        $objOnePrograma = new ProgramaModel($id);
        $programa = $objOnePrograma->getOnePrograma();
       $data = [
           "id" => $programa[0]->id,
           "codigo" => $programa[0]->codigo,
           "nombre" => $programa[0]->nombre,
           "centro" => $programa[0]->fkidCentroFormacion
       ];
         $this->render("programa/viewOnePrograma.php", $data);
    }


    

    
}