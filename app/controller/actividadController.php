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
}