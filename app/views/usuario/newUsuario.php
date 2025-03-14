<div class="container2">
    <div class="data-container">
        <form action="/usuario/create" method="post">
            <div class="form-group">
                <label for="txtNombre">Nombre:</label>
                <input type="text" name="txtNombre" id="txtNombre">
            </div>
            <div class="form-group">
                <label for="txtTipoDoc">Tipo Documento</label>
                <select name="txtTipoDoc" id="txtTipoDoc">
                    <option value="CC">CC</option>
                    <option value="TI">TI</option>
                    <option value="CE">CE</option>
                </select>
            </div>
            <div class="form-group">
                <label for="txtDocumento">Documento:</label>
                <input type="number" name="txtDocumento" id="txtDocumento">
            </div>
            
            <div class="form-group">
                <label for="txtFechaNac">Fecha de nacimiento:</label>
                <input type="date" name="txtFechaNac" id="txtFechaNac">
            </div>
            <div class="form-group">
                <label for="txtEmail">Email:</label>
                <input type="email" name="txtEmail" id="txtEmail">
            </div>
            <div class="form-group">
                <label for="txtGenero">Genero:</label>
                <select name="txtGenero" id="txtGenero">
                    <option value="M">M</option>
                    <option value="F">F</option>
                </select>
            </div>
            <div class="form-group">
                <label for="txtEstado">Estado:</label>
                <select name="txtEstado" id="txtEstado">
                    <option value="Activo">Activo</option>
                    <option value="Inactivo">Inactivo</option>
                </select>
            </div>
                
            <div class="form-group">
                <label for="txtTelefono">Telefono:</label>
                <input type="tel" name="txtTelefono" id="txtTelefono">
            </div>
            <div class="form-group">
                <label for="txtEps">Eps:</label>
                <input type="text" name="txtEps" id="txtEps">
            </div>
            <div class="form-group">
                <label for="txtTipoSangre">Tipo Sangre:</label>
                <select name="txtTipoSangre" id="txtTipoSangre">
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                </select>
            </div>
            <div class="form-group">
                <label for="txtPeso">Peso:</label>
                <input type="number" name="txtPeso" id="txtPeso">
            </div>
            <div class="form-group">
                <label for="txtEstatura">Estatura:</label>
                <input type="number" name="txtEstatura" id="txtEstatura">
            </div>
            <div class="form-group">
                <label for="txtTelefonoEmer">TelefonoEmer:</label>
                <input type="text" name="txtTelefonoEmer" id="txtTelefonoEmer">
            </div>
            <div class="form-group">
                <label for="txtPassword">Password:</label>
                <input type="password" name="txtPassword" id="txtPassword">
            </div>
            <div class="form-group">
                <label for="txtObservaciones">Observaciones:</label>
                <input type="text" name="txtObservaciones" id="txtObservaciones">
            </div>
            <div class="form-group">
                <label for="txtRol">Rol:</label>
                <select name="txtRol" id="txtRol">
                    <?php
                    if (isset($rol) && is_array($rol)) {
                        foreach ($rol as $key => $value) {
                            echo "<option value='$value->id'>$value->nombre</option>";
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
                            echo "<option value='$value->id'>$value->ficha</option>";
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
                            echo "<option value='$value->id'>$value->nombre</option>";
                        }
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="txtTipoUsuario">Tipo Usuario:</label>
                <select name="txtTipoUsuario" id="txtTipoUsuario">
                    <?php
                    if (isset($usuario) && is_array($usuario)) {
                        foreach ($usuario as $key => $value) {
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