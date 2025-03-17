<?php
return  [
    "/" => [
        "controller" => "App\Controller\HomeController",
        "action" => "index"
    ],
    //Rutas login
    "/login/init" => [
        "controller" => "App\Controller\LoginController",
        "action" => "initLogin"
    ],
    "/login/logout" => [
        "controller" => "App\Controller\LoginController",
        "action" => "logout"
    ],

    "/home" => [
        "controller" => "App\Controller\HomeController",
        "action" => "home"
    ],
    "/saludo" => [
        "controller" => "App\Controller\HomeController",
        "action" => "saludar"
    ],
    "/rol/index" => [
        "controller" => "App\Controller\RolController",
        "action" => "index"
    ],
    "/rol/new" => [//Muestra el formulario de creacion
        "controller" => "App\Controller\RolController",
        "action" => "new"
    ],
    "/rol/create" => [//Crea el rol en la base de datos
        "controller" => "App\Controller\RolController",
        "action" => "create"
    ],
    "/rol/view/(\d+)" => [//Visualiza el rol con el id especificado
        "controller" => "App\Controller\RolController",
        "action" => "view"
    ],
    "/rol/edit/(\d+)"=>[
        "controller"=> "App\Controller\RolController",
        "action"=> "editRol"
    ],
    "/rol/update"=>[ //editar el rol con el id especificado
        "controller"=> "App\Controller\RolController",
        "action"=> "updateRol"
    ],
    "/rol/delete/(\d+)"=>[ 
        "controller"=> "App\Controller\RolController",
        "action"=> "deleteRol"
    ],
    "/centro/index" => [
        "controller" => "App\Controller\CentroController",
        "action" => "index"
    ],
    "/centro/new" => [
        "controller" => "App\Controller\CentroController",
        "action" => "new"
    ],
    "/centro/create" => [
        "controller" => "App\Controller\CentroController",
        "action" => "create"
    ],
    "/centro/view/(\d+)" => [
        "controller" => "App\Controller\CentroController",
        "action" => "view"
    ],
    "/centro/edit/(\d+)"=>[
        "controller"=> "App\Controller\CentroController",
        "action"=> "editCentro"
    ],
    "/centro/update"=>[
        "controller"=> "App\Controller\CentroController",
        "action"=> "updateCentro"
    ],
    "/centro/delete/(\d+)" => [
        "controller" => "App\Controller\CentroController",
        "action" => "deleteCentro"
    ],
    "/programa/index" => [
        "controller" => "App\Controller\ProgramaController",
        "action" => "viewAll"
    ],
    "/programa/new" => [
        "controller" => "App\Controller\ProgramaController",
        "action" => "new"
    ],
    "/programa/create" => [
        "controller" => "App\Controller\ProgramaController",
        "action" => "create"
    ],
    "/programa/view/(\d+)" => [
        "controller" => "App\Controller\ProgramaController",
        "action" => "view"
    ],
    "/programa/edit/(\d+)" => [
        "controller" => "App\Controller\ProgramaController",
        "action" => "editPrograma"
    ],
    "/programa/update" => [
        "controller" => "App\Controller\ProgramaController",
        "action" => "updatePrograma"
    ],
    "/programa/delete/(\d+)" => [
        "controller" => "App\Controller\ProgramaController",
        "action" => "deletePrograma"
    ],
    "/actividad/index" => [
        "controller" => "App\Controller\ActividadController",
        "action" => "index"
    ],
    "/actividad/new" => [
        "controller" => "App\Controller\ActividadController",
        "action" => "new"
    ],
    "/actividad/create" => [
        "controller" => "App\Controller\ActividadController",
        "action" => "create"
    ],
    "/actividad/view/(\d+)" => [
        "controller" => "App\Controller\ActividadController",
        "action" => "view"
    ],
    "/actividad/edit/(\d+)" => [
        "controller" => "App\Controller\ActividadController",
        "action" => "editActividad"
    ],
    "/actividad/update" => [
        "controller" => "App\Controller\ActividadController",
        "action" => "updateActividad"
    ],
    "/actividad/delete/(\d+)" => [
        "controller" => "App\Controller\ActividadController",
        "action" => "deleteActividad"
    ],

    "/tipoUsuario/index" => [
        "controller" => "App\Controller\TipoUsuarioController",
        "action" => "index"
    ],
    "/tipoUsuario/new" => [
        "controller" => "App\Controller\TipoUsuarioController",
        "action" => "new"
    ],
    "/tipoUsuario/create" => [
        "controller" => "App\Controller\TipoUsuarioController",
        "action" => "create"
    ],
    "/tipoUsuario/view/(\d+)" => [
        "controller" => "App\Controller\TipoUsuarioController",
        "action" => "view"
    ],
    "/tipoUsuario/edit/(\d+)" => [
        "controller" => "App\Controller\TipoUsuarioController",
        "action" => "editTipoUsuario"
    ],
    "/tipoUsuario/update" => [
        "controller" => "App\Controller\TipoUsuarioController",
        "action" => "updateTipoUsuario"
    ],
    "/tipoUsuario/delete/(\d+)" => [
        "controller" => "App\Controller\TipoUsuarioController",
        "action" => "deleteTipoUsuario"
    ],
    "/grupo/index" => [
        "controller" => "App\Controller\GrupoController",
        "action" => "viewAll"
    ],
    "/grupo/new" => [
        "controller" => "App\Controller\GrupoController",
        "action" => "new"
    ],
    "/grupo/create" => [
        "controller" => "App\Controller\GrupoController",
        "action" => "create"
    ],
    "/grupo/view/(\d+)" => [
        "controller" => "App\Controller\GrupoController",
        "action" => "view"
    ],
    "/grupo/edit/(\d+)" => [
        "controller" => "App\Controller\GrupoController",
        "action" => "editGrupo"
    ],
    "/grupo/update" => [
        "controller" => "App\Controller\GrupoController",
        "action" => "updateGrupo"
    ],
    "/grupo/delete/(\d+)" => [
        "controller" => "App\Controller\GrupoController",
        "action" => "deleteGrupo"
    ],
    "/usuario/index" => [
        "controller" => "App\Controller\UsuarioController",
        "action" => "viewAll"
    ],
    "/usuario/new" => [
        "controller" => "App\Controller\UsuarioController",
        "action" => "new"
    ],
    "/usuario/create" => [
        "controller" => "App\Controller\UsuarioController",
        "action" => "create"
    ],
    "/usuario/view/(\d+)" => [
        "controller" => "App\Controller\UsuarioController",
        "action" => "viewOneUsuario"
    ],
    "/usuario/edit/(\d+)" => [
        "controller" => "App\Controller\UsuarioController",
        "action" => "editUsuario"
    ],
    "/usuario/update" => [
        "controller" => "App\Controller\UsuarioController",
        "action" => "updateUsuario"
    ],
    "/usuario/delete/(\d+)" => [
        "controller" => "App\Controller\UsuarioController",
        "action" => "deleteUsuario"
    ],


    



    
    
];