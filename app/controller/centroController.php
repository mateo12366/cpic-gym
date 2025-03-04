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
}