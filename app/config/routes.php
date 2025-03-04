<?php
return  [
    "/" => [
        "controller" => "App\Controller\HomeController",
        "action" => "index"
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
    "/centro/index" => [
        "controller" => "App\Controller\CentroController",
        "action" => "index"
    ],
    "/programa/index" => [
        "controller" => "App\Controller\ProgramaController",
        "action" => "viewAll"
    ],
    "/programa/new" => [
        "controller" => "App\Controller\ProgramaController",
        "action" => "new"
    ],
    "/programa/view/(\d+)" => [
        "controller" => "App\Controller\ProgramaController",
        "action" => "view"
    ],
    "/programa/create" => [
        "controller" => "App\Controller\ProgramaController",
        "action" => "create"
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
    "/rol/edit/(\d+)"=>[ //visualiza el rol con el id especificado
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
    ]
    
];