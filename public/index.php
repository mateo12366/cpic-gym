<?php

require_once '../app/config/global.php';
require_once '../app/controller/homeController.php';
require_once '../app/controller/rolController.php';
require_once '../app/controller/centroController.php';
require_once '../app/controller/programaController.php';
require_once '../app/controller/actividadController.php';


//acceder a lo que llegue en la url
$url = $_SERVER["REQUEST_URI"];


// print_r($route);


$routesList = require_once '../app/config/routes.php';

$matchedRoute = null;
foreach ($routesList as $route => $routeConfig) {
    if (preg_match("#^$route$#", $url, $matches)) {
        // SE asigana el array requerido con el controller y la accion a ejecutar
        $matchedRoute = $routeConfig;
        break;
    }
}

if ($matchedRoute) {
    $controllerName = $matchedRoute['controller'];
    $actionName = $matchedRoute['action'];
    if (class_exists($controllerName) && method_exists($controllerName, $actionName)) {
        //Captura los parametros que llegan de la url
        $parameters = array_slice($matches, 1);
        $controller = new $controllerName();
        // Se llama al metodo del controlador correspondiente
         $controller -> $actionName(...$parameters);
         exit;
    } else {
        echo "La accion y/o el controlador no existen en la aplicacion"; 
    }     
}else {
    http_response_code(404);
    echo "Error 404. La pagina solicitada no existe";
}
// if (array_key_exists($route, $routesList)) {
//     $controllerName = $routesList[$route]["controller"];
//     $actionName = $routesList[$route]["action"];
    
//     if (class_exists($controllerName) && method_exists($controllerName, $actionName)) {
//         //declara objeto de la clase controller correspondinete
//         $controller = new $controllerName();
//         // Se llama al metodo del controlador correspondiente
//         $controller -> $actionName();
//     } else {
//         echo "no existe";
//     }

//     // //declara objeto de la clase HomeController
//     // $controller = new HomeController();
//     // $controller2 = new RolController();
//     // // Se llama al metodo index
//     // $controller-> index();
    
// }else {
//     http_response_code(404);
//     echo "Error 404. La pagina solicitada no existe";
// }


// $arryFrutas = [
//     "naranja" => [
//         "color" => "naranja",
//         "sbor" => "acido"
//     ],
//     "pera" => [
//         "color" => "verde",
//         "sabor" => "dulce"
//     ],
//     "manzana" => [
//         "color" => "rojo",
//         "sabor" => "dulce"
//     ]
// ];

// $fruta = "pera";

// // si la clave pera existe en el array arrayFrutas
// if (array_key_exists($fruta, $arryFrutas)) {
//     echo "<br>Color: ".$arryFrutas[$fruta]["color"];
//     echo "<br>Sabor: ".$arryFrutas[$fruta]["sabor"];
// } else {
//     echo "<br>La fruta no existe";
// }