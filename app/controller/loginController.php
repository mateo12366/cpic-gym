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
                $res= $usuarioObj->validarLogin($email, $password);
                if ($res) {
                    header("Location: /programa/index");
                }else {
                    $data =[
                        "error" => "El usuario y/o contraseña son incorrectos"
                    ];
                }
            }else {
                $data = [
                    "error" => "El usuario y/o contraseña no deben estar vacios"
                ];
                
            }
            $this->render('login/login.php', $data);
        
        }else {
            $this->render('login/login.php');

        }
    }

    public function logout(){
        session_destroy();
        header('Location: /login/init');
    }

    public function testHash(){
        $password = "123";
        $passwordHasehd = password_hash($password, PASSWORD_DEFAULT);
        echo "password = $password";
        echo "passwor Hash = $passwordHasehd";
        if (password_verify($password, $passwordHasehd)) {
            echo "Contraseña valida ";
        }else {
            echo "Contraseña incorrecta ";
        }
    }
}