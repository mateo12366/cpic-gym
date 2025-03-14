<?php

namespace App\Controller;

require_once MAIN_APP_ROUTE."../controller/baseController.php";
require_once MAIN_APP_ROUTE."../models/usuarioModel.php";

use App\Controller\BaseController;
use App\Models\UsuarioModel;

class LoginController extends BaseController{

    public function __construct(){
        $this->layout ="login_layout";
    }
    public function initLogin(){
        
        
        if (isset($_POST['txtEmail']) && isset($_POST['txtPassword'])) {
            $email = trim($_POST['txtEmail']) ?? null;
            $password = trim($_POST['txtPassword']) ?? null;

            //El usuario envio el email y contraseña para validar el login 
            if ($email != "" && $password != "") {
                //Se envia a validar el login
                $usuarioObj = new UsuarioModel();
                $usuarioObj->validarLogin($email, $password);

            }else {
                $data = [
                    "error" => "El usuario y/o contraseña no deben estar vacios"
                ];
                $this->render('login/login.php', $data);
            }
        
        }else {
            echo "hdh";
            $this->render('login/login.php');

        }

    }
}