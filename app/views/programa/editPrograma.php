<div class="container2">
    <div class="data-container">
        <form action="/programa/update" method="post">
            <div class="form-group">
                <label for="txtId">ID:</label>
                <input type="text" value="<?php echo $infoReal->id ?>" name="txtId" id="txtId" readonly>
            </div>
            <div class="form-group">
                <label for="txtNombre">Codigo:</label>
                <input type="text" value="<?php echo $infoReal->codigo ?>" name="txtCodigo" id="txtCodigo">
            </div>
            <div class="form-group">
                <label for="txtNombre">Nombre:</label>
                <input type="text" value="<?php echo $infoReal->nombre ?>" name="txtNombre" id="txtNombre">
            </div>
            <div class="form-group">
                <label for="txtCentro">Centro de Formacion:</label>
                <select name="txtCentro" id="txtCentro">
                    <?php
                    foreach ($centros as $key => $value) {
                        echo "<option value='$value->id'>$value->nombre</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <button type="submit">Editar</button>
            </div>
        </form>
    </div>
</div>