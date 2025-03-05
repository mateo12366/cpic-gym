<div class="container2">
    <div class="data-container">
        <form action="/actividad/update" method="post">
            <div class="form-group">
                <label for="txtId">ID</label>
                <input type="text" value="<?php echo $actividad->id ?>" name="txtId" id="txtId" readonly>
            </div>
            <div class="form-group">
                <label for="txtNombre">Nombre</label>
                <input type="text" value="<?php echo $actividad->nombre ?>" name="txtNombre" id="txtNombre">
            </div>
            <div class="form-group">
                <label for="txtDescripcion">Descripcion</label>
                <textarea name="txtDescripcion" id="txtDescripcion"><?php echo $actividad->descripcion ?></textarea>
            </div>
            <div class="form-group">
                <button type="submit">Editar</button>
            </div>
        </form>
    </div>
</div>