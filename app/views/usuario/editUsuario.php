<div class="container2">
    <div class="data-container">
        <form action="/usuario/update" method="post">
        <div class="form-group">
                <label for="txtId">ID</label>
                <input type="text" value="<?php echo $usuario->id ?>" name="txtId" id="txtId" readonly>
            </div>
            <div class="form-group">
                <label for="txtNombre">Nombre:</label>
                <input type="text" name="txtNombre" id="txtNombre" value="<?php echo $usuario->nombre; ?>">
            </div>
            <div class="form-group">
                <label for="txtTipoDoc">Tipo Documento</label>
                <select name="txtTipoDoc" id="txtTipoDoc">
                    <option value="CC" <?php echo ($usuario->tipoDoc == 'CC') ? 'selected' : ''; ?>>CC</option>
                    <option value="TI" <?php echo ($usuario->tipoDoc == 'TI') ? 'selected' : ''; ?>>TI</option>
                    <option value="CE" <?php echo ($usuario->tipoDoc == 'CE') ? 'selected' : ''; ?>>CE</option>
                </select>
            </div>
            <div class="form-group">
                <label for="txtDocumento">Documento:</label>
                <input type="number" name="txtDocumento" id="txtDocumento" value="<?php echo $usuario->documento; ?>">
            </div>
            <div class="form-group">
                <label for="txtFechaNac">Fecha de nacimiento:</label>
                <input type="date" name="txtFechaNac" id="txtFechaNac" value="<?php echo date('Y-m-d', strtotime( $usuario->fechaNac)); ?>">
            </div>
            <div class="form-group">
                <label for="txtEmail">Email:</label>
                <input type="email" name="txtEmail" id="txtEmail" value="<?php echo $usuario->email; ?>">
            </div>
            <div class="form-group">
                <label for="txtGenero">Genero:</label>
                <select name="txtGenero" id="txtGenero">
                    <option value="M" <?php echo ($usuario->genero == 'M') ? 'selected' : ''; ?>>M</option>
                    <option value="F" <?php echo ($usuario->genero == 'F') ? 'selected' : ''; ?>>F</option>
                </select>
            </div>
            <div class="form-group">
                <label for="txtEstado">Estado:</label>
                <select name="txtEstado" id="txtEstado">
                    <option value="Activo" <?php echo ($usuario->estado == 'Activo') ? 'selected' : ''; ?>>Activo</option>
                    <option value="Inactivo" <?php echo ($usuario->estado == 'Inactivo') ? 'selected' : ''; ?>>Inactivo</option>
                </select>
            </div>
            <div class="form-group">
                <label for="txtTelefono">Telefono:</label>
                <input type="tel" name="txtTelefono" id="txtTelefono" value="<?php echo $usuario->telefono; ?>">
            </div>
            <div class="form-group">
                <label for="txtEps">Eps:</label>
                <input type="text" name="txtEps" id="txtEps" value="<?php echo $usuario->eps; ?>">
            </div>
            <div class="form-group">
                <label for="txtTipoSangre">Tipo Sangre:</label>
                <select name="txtTipoSangre" id="txtTipoSangre">
                    <option value="O+" <?php echo ($usuario->tipoSangre == 'O+') ? 'selected' : ''; ?>>O+</option>
                    <option value="O-" <?php echo ($usuario->tipoSangre == 'O-') ? 'selected' : ''; ?>>O-</option>
                    <option value="A+" <?php echo ($usuario->tipoSangre == 'A+') ? 'selected' : ''; ?>>A+</option>
                    <option value="A-" <?php echo ($usuario->tipoSangre == 'A-') ? 'selected' : ''; ?>>A-</option>
                    <option value="B+" <?php echo ($usuario->tipoSangre == 'B+') ? 'selected' : ''; ?>>B+</option>
                    <option value="B-" <?php echo ($usuario->tipoSangre == 'B-') ? 'selected' : ''; ?>>B-</option>
                    <option value="AB+" <?php echo ($usuario->tipoSangre == 'AB+') ? 'selected' : ''; ?>>AB+</option>
                    <option value="AB-" <?php echo ($usuario->tipoSangre == 'AB-') ? 'selected' : ''; ?>>AB-</option>
                </select>
            </div>
            <div class="form-group">
                <label for="txtPeso">Peso:</label>
                <input type="number" name="txtPeso" id="txtPeso" value="<?php echo $usuario->peso; ?>">
            </div>
            <div class="form-group">
                <label for="txtEstatura">Estatura:</label>
                <input type="number" name="txtEstatura" id="txtEstatura" value="<?php echo $usuario->estatura; ?>">
            </div>
            <div class="form-group">
                <label for="txtTelefonoEmer">TelefonoEmer:</label>
                <input type="text" name="txtTelefonoEmer" id="txtTelefonoEmer" value="<?php echo $usuario->telefonoEmer; ?>">
            </div>
            <div class="form-group">
                <label for="txtPassword">Password:</label>
                <input type="password" name="txtPassword" id="txtPassword" value="<?php echo $usuario->password; ?>">
            </div>
            <div class="form-group">
                <label for="txtObservaciones">Observaciones:</label>
                <input type="text" name="txtObservaciones" id="txtObservaciones" value="<?php echo $usuario->observaciones; ?>">
            </div>
            <div class="form-group">
                <label for="txtRol">Rol:</label>
                <select name="txtRol" id="txtRol">
                    <?php
                    if (isset($rol) && is_array($rol)) {
                        foreach ($rol as $key => $value) {
                            $selected = ($value->id == $usuario->FK_id_rol) ? "selected" : "";
                            echo "<option value='$value->id' $selected>$value->nombre</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="txtGrupo">Grupo:</label>
                <select name="txtGrupo" id="txtGrupo">
                    <?php
                    if (isset($grupo) && is_array($grupo)) {
                        foreach ($grupo as $key => $value) {
                            $selected = ($value->id == $usuario->FK_id_grupo) ? "selected" : "";
                            echo "<option value='$value->id' $selected>$value->ficha</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="txtCentro">Centro:</label>
                <select name="txtCentro" id="txtCentro">
                    <?php
                    if (isset($centros) && is_array($centros)) {
                        foreach ($centros as $key => $value) {
                            $selected = ($value->id == $usuario->FK_id_centro) ? "selected" : "";
                            echo "<option value='$value->id' $selected>$value->nombre</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="txtTipoUsuario">Tipo Usuario:</label>
                <select name="txtTipoUsuario" id="txtTipoUsuario">
                    <?php
                    if (isset($tipoUsuario) && is_array($tipoUsuario)) {
                        foreach ($tipoUsuario as $key => $value) {
                            $selected = ($value->id == $usuario->FK_id_tipo_usuario) ? "selected" : "";
                            echo "<option value='$value->id' $selected>$value->nombre</option>";
                        }
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