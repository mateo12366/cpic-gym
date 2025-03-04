<div class="container2">
    <div class="data-container">

        <?php
        if (isset($actividades) && is_array($actividades)) {
            foreach ($actividades as $key => $value) {
                echo "<div class='record'>
                <span>$value->id - $value->nombre - $value->descripcion  </span>
                    <div class='buttons'>
                        <div class='buttons'>
                                    <a href='/rol/view/$value->id'>consultar</a>
                                    <a href='/rol/edit/$value->id'>editar</a>
                                    <a href='/rol/delete/$value->id'>eliminar</a>
                                </div>
                    </div>
                </div>";
            }
        }
        ?>
    </div>
</div>