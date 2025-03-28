<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizacion tablas</title>
    <link rel="stylesheet" href="/css/styles.css">
</head>

<body>
    <header>
        <h1>GymCPIC - Software de gestion del gimnasio CPIC</h1>
    </header>
    <div class="container">
        <div class="menu">
            <nav>
                <ul>
                    <li><a href="/rol/index">Roles</a></li>
                    <li><a href="/centro/index">Centros</a></li>
                    <li><a href="/programa/index">Programas</a></li>
                    <li><a href="/actividad/index">Actividades</a></li>
                    <li><a href="/tipoUsuario/index">Tipo usuario Gym</a></li>
                    <li><a href="/grupo/index">Grupos</a></li>
                    <li><a href="/usuario/index">Usuarios</a></li>
                    <li><a href="/registroIngreso/index">Registro Ingreso</a></li>
                </ul>
            </nav>
        </div>

        <?php include_once $content; ?>

    </div>
    <footer>
        <p>Developed by ADSO 2873707</p>
    </footer>
</body>

</html>