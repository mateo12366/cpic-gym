<div class="container2">
    <div class="btn-new">
        <a href="/usuario/new" class="a-new">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" width="35" height="35"
                stroke-width="2" stroke-linejoin="round" stroke-linecap="round" stroke="currentColor">
                <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path>
                <path d="M9 12h6"></path>
                <path d="M12 9v6"></path>
            </svg>
            <span>Crear Ficha</span>
        </a>
    </div>
    <div class="data-container">
        <?php
        
        if (isset($usuario) && is_array($usuario)) {
            foreach ($usuario as $key => $value) {
                echo "<div class='record'>

                    <span>$value->id - $value->nombre - $value->tipoDoc - $value->documento - $value->fechaNac - $value->email - $value->genero - $value->estado - $value->telefono - $value->eps - $value->tipoSangre - $value->peso - $value->estatura - $value->telefonoEmer - $value->password - $value->observaciones - $value->rol - $value->grupo - $value->centro - $value->tipoUsuario</span><div class='buttons'>
                        <a href='/usuario/view/$value->id'>consultar</a>
                        <a href='/usuario/edit/$value->id'>editar</a>
                        <a href='/usuario/delete/$value->id'>eliminar</a>
                    </div>
                </div>";
            }
        }
        ?>
    </div>
</div>