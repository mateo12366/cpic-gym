<div class="container2">
    <div class="data-container">

        <?php
        if (isset($centros) && is_array($centros)) {
            foreach ($centros as $key => $value) {
                echo "<div class='record'>
                <span>$value->id - $value->nombre </span>
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