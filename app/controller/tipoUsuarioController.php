<?php

namespace App\Controller;
use App\Models\TipoUsuarioModel;

require_once MAIN_APP_ROUTE."../controller/baseController.php";
require_once MAIN_APP_ROUTE."../models/tipoUsuarioModel.php";

class TipoUsuarioController extends BaseController{

    public function __construct()
    {
        $this->layout = "admin_layout";
    }
    public function index(){
        // echo "<br>CONTROLLER > RolController";
        // echo "<br>ACTION > index";
        // echo "<hr>";

        //se crea un objeto del modelo rol
        $objUsuario = new TipoUsuarioModel();
        $usuario = $objUsuario->getAll();
        // echo "<pre>";
        // print_r($roles);
        // echo "</pre>";

        // require_once MAIN_APP_ROUTE."../views/rols/viewRol.php";
        $data = [
            "usuario" => $usuario
        ];
        $this->render("tipoUsuarioGym/viewTipoUsuario.php", $data);
    }

    //Muestra el formulario para crear un nuevo rol
    public function new(){
        $this->render("tipoUsuarioGym/newTipoUsuario.php");
    }

    //guarda los datos del formulario
    public function create(){
        $nombre = $_POST["txtNombre"] ?? null;
        if ($nombre) {
            $objUsuario = new TipoUsuarioModel(null, $nombre);
            $res = $objUsuario->save();
            if ($res) {
                header("Location: /tipoUsuario/index");

            }else{
                
                header("Location: /tipoUsuario/index");
            }
        }
    }

    public function view($id){
        $objOneUsuario = new TipoUsuarioModel($id);
        $usuario = $objOneUsuario->getOneUsuario();
       $data = [
           "id" => $usuario[0]->id,
           "nombre" => $usuario[0]->nombre
       ];
         $this->render("tipoUsuarioGym/viewOneTipoUsuario.php", $data);
    }

    public function editTipoUsuario($id)
    {
        $objUsuario = new TipoUsuarioModel($id);
        $usuarioInfo = $objUsuario->getOneUsuario();
        $data = [
            "usuarioInfo" => $usuarioInfo[0]
        ];
        $this->render("tipoUsuarioGym/editTipoUsuario.php", $data);
    }
    public function updateTipoUsuario()
    {// se edita como tal en la BD
        if (isset($_POST["txtId"])) {
            $id = $_POST['txtId'] ?? null;
            $nombre = $_POST['txtNombre'] ?? null;
            $objUsuarioEdit = new TipoUsuarioModel($id, $nombre);
            $res = $objUsuarioEdit->editTipoUsuario();
            print_r($res);

            if ($res) {
                header("Location: /tipoUsuario/index");
            } else {
                echo "Error al editar el tipo de usuario";
            }
        }
        
    }
    
    public function deleteTipoUsuario($id)
    {
        $objUsuario = new TipoUsuarioModel($id);
        $res = $objUsuario->deleteTipoUsuario();

        if ($res) {
            header("Location: /tipoUsuario/index");
        } else {
            echo "Error al eliminar el tipo de usuario";
        }
    }

    
}