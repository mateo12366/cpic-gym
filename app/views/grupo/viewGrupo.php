<div class="container2">
<div class="btn-new">

<a href="/grupo/new" class="a-new">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" width="35" height="35"
        stroke-width="2" stroke-linejoin="round" stroke-linecap="round" stroke="currentColor">
        <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path>
        <path d="M9 12h6"></path>
        <path d="M12 9v6"></path>
    </svg>
    <span>Crear Grupo</span>
</a>
</div>
    <div class="data-container">

        <?php
        if (isset($grupos) && is_array($grupos)) {
            foreach ($grupos as $key => $value) {
                echo "<div class='record'>
                <span>$value->id - $value->ficha- $value->cantApren -$value->estado - $value->fechaInicioLect -$value->fechaFinLect -$value->programa </span>
                    <div class='buttons'>
                        <div class='buttons'>
                                    <a href='/grupo/view/$value->id'>consultar</a>
                                    <a href='/grupo/edit/$value->id'>editar</a>
                                    <a href='/grupo/delete/$value->id'>eliminar</a>
                                </div>
                    </div>
                </div>";
            }
        }
        ?>
        
    </div>
</div>