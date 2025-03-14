<div class="container2">
    <div class="data-container">
        <form action="/grupo/create" method="post">
            <div class="form-group">
                <label for="txtFicha">Ficha:</label>
                <input type="number" name="txtFicha" id="txtFicha">
            </div>
            <div class="form-group">
                <label for="txtAprendices">Cantidad Aprendices:</label>
                <input type="number" name="txtAprendices" id="txtAprendices">
            </div>
            <div class="form-group">
                <label for="txtEstado">Estado:</label>
                <input type="text" name="txtEstado" id="txtEstado">
            </div>
            <div class="form-group">
                <label for="txtFechaInicio">Fecha Inicio Etapa Lectiva:</label>
                <input type="date" name="txtFechaInicio" id="txtFechaInicio">
            </div>
            <div class="form-group">
                <label for="txtFechaFin">Fecha Fin Etapa Lectiva:</label>
                <input type="date" name="txtFechaFin" id="txtFechaFin">
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
            

            <div>
                <button type="submit">Crear</button>
            </div>
        </form>
    </div>
</div>