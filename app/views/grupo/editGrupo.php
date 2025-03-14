<div class="container2">
    <div class="data-container">
        <form action="/grupo/update" method="post">
            <div class="form-group">
                <label for="txtId">ID:</label>
                <input type="text" value="<?php echo $infoGrupo->id ?>" name="txtId" id="txtId" readonly>
            </div>
            <div class="form-group">
                <label for="txtFicha">Ficha:</label>
                <input type="text" value="<?php echo $infoGrupo->ficha ?>" name="txtFicha" id="txtFicha">
            </div>
            <div class="form-group">
                <label for="txtAprendices">Cantidad Aprendices:</label>
                <input type="number" value="<?php echo $infoGrupo->CantApren ?>" name="txtAprendices"
                    id="txtAprendices">
            </div>
            <div class="form-group">
                <label for="txtEstado">Estado:</label>
                <input type="text" value="<?php echo $infoGrupo->estado ?>" name="txtEstado" id="txtEstado">
            </div>
            <div class="form-group">
                <label for="txtFechaInicio">Fecha Inicio Etapa Lectiva:</label>
                <input type="date" value="<?php echo $infoGrupo->fechaInicioEtapaLect ?>" name="txtFechaInicio"
                    id="txtFechaInicio">
            </div>
            <div class="form-group">
                <label for="txtFechaFin">Fecha Fin Etapa Lectiva:</label>
                <input type="date" value="<?php echo $infoGrupo->fechaFinEtapaLect ?>" name="txtFechaFin"
                    id="txtFechaFin">
            </div>

            <div class="form-group">
                <label for="txtPrograma">Programa:</label>
                <select name="txtPrograma" id="txtPrograma">
                    <?php
                    if (isset($programas) && is_array($programas)) {
                        foreach ($programas as $key => $value) {
                            echo "<option value='$value->id'>$value->nombre</option>";
                        }
                    }
                    ?>
                </select>
            </div>
    </div>
    <div class="form-group">
        <button type="submit">Editar</button>
    </div>
    </form>
</div>
</div>