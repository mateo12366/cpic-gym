<?php

namespace App\Controller;

use App\Models\GrupoModel;
use App\Models\ProgramaModel;
use DateTime;


require_once MAIN_APP_ROUTE . "../controller/baseController.php";
require_once MAIN_APP_ROUTE . "../models/grupoModel.php";



class GrupoController extends BaseController
{

    public function __construct()
    {
        $this->layout = "admin_layout";
    }

    public function index()
    {
        // echo "<br>CONTROLLER > RolController";
        // echo "<br>ACTION > index";
        // echo "<hr>";

        //se crea un objeto del modelo rol
        $objGrupo = new GrupoModel();
        $grupos = $objGrupo->getAll();
        // echo "<pre>";
        // print_r($roles);
        // echo "</pre>";

        // require_once MAIN_APP_ROUTE."../views/rols/viewRol.php";
        $data = [
            "grupos" => $grupos
        ];
        $this->render("grupo/viewGrupo.php", $data);
    }

    public function viewAll()
    {
        $objGrupo = new GrupoModel();
        $grupos = $objGrupo->getAllGrupo();
        $data = [
            "grupos" => $grupos
        ];
        $this->render("grupo/viewGrupo.php", $data);
    }

    public function new()
    {
        $objPrograma = new ProgramaModel();
        $programas = $objPrograma->getAll();

        $data = [
            "programas" => $programas
        ];
        $this->render("grupo/newGrupo.php", $data);
    }

    public function create()
    {
        $ficha = $_POST['txtFicha'] ?? null;
        $cantApren = $_POST['txtAprendices'] ?? null;
        $estado = $_POST['txtEstado'] ?? null;
        $fechaInicioLect = $_POST['txtFechaInicio'] ?? null;
        $fechaFinLect = $_POST['txtFechaFin'] ?? null;
        $programa = $_POST['txtPrograma'] ?? null;

        if ($ficha && $cantApren && $estado && $fechaInicioLect && $fechaFinLect && $programa) {
            $fechaInicioLect = new DateTime($fechaInicioLect);
            $fechaFinLect = new DateTime($fechaFinLect);
            $objGrupo = new GrupoModel(null, $ficha, $cantApren, $estado, $fechaInicioLect, $fechaFinLect, $programa);
            $res = $objGrupo->save();
            if ($res) {
                header("Location: /grupo/index");

            } else {

                header("Location: /grupo/index");
            }
        }
    }

    public function editGrupo($id)
    {
        $objGrupo = new GrupoModel($id);
        $grupoInfo = $objGrupo->getOneGrupo();
        $objPrograma = new ProgramaModel();
        $programas = $objPrograma->getAll();
        $data = [
            "infoGrupo" => $grupoInfo[0],
            "programas" => $programas
        ];
        $this->render("grupo/editGrupo.php", $data);
    }

    public function updateGrupo()
    {// se edita como tal en la BD
        if (isset($_POST["txtId"])) {
            $id = $_POST['txtId'] ?? null;
            $ficha = $_POST['txtFicha'] ?? null;
            $cantApren = $_POST['txtAprendices'] ?? null;
            $estado = $_POST['txtEstado'] ?? null;
            $fechaInicioLect = $_POST['txtFechaInicio'] ?? null;
            $fechaFinLect = $_POST['txtFechaFin'] ?? null;
            $programa = $_POST['txtPrograma'] ?? null;
            $fechaInicioLect = new DateTime($fechaInicioLect);
            $fechaFinLect = new DateTime($fechaFinLect);

            $objGrupoEdit = new GrupoModel($id, $ficha, $cantApren, $estado, $fechaInicioLect, $fechaFinLect, $programa);
            $res = $objGrupoEdit->editGrupo();
            print_r($res);

            if ($res) {
                header("Location: /grupo/index");
            } else {
                echo "Error al editar el grupo";
            }
        }

    }

    public function deleteGrupo($id)
    {
        $objGrupo = new GrupoModel($id);
        $res = $objGrupo->deleteGrupo();

        if ($res) {
            header("Location: /grupo/index");
        } else {
            echo "Error al eliminar el grupo";
        }
    }

    public function view($id)
    {
        $objOneGrupo = new GrupoModel($id);
        $grupo = $objOneGrupo->getOneGrupo();

        $objPrograma = new ProgramaModel($id);
        $programa = $objPrograma->getOnePrograma();

        $data = [
            "id" => $grupo[0]->id,
            "ficha" => $grupo[0]->ficha,
            "cantApren" => $grupo[0]->cantApren,
            "estado" => $grupo[0]->estado,
            "fechaInicioLect" => $grupo[0]->fechaInicioLect, // Asegúrate de que coincida con el nombre de la columna en la BD
            "fechaFinLect" => $grupo[0]->fechaFinLect, // Asegúrate de que coincida con el nombre de la columna en la BD
            "programa" => $programa[0]->nombre
        ];
        $this->render("grupo/viewOneGrupo.php", $data);
    }




}