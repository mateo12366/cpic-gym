<div class="login-container">
    <h2>Iniciar sesion</h2>
    <form action="/login/init" method="post">

        <?php if (isset($error)): ?>
            <div class="error">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>
        <div class="input-group">
            <label for="txtEmail">Email: </label>
            <input type="email" name="txtEmail" id="txtEmail" required>
        </div>
        <div class="input-group">
            <label for="txtPassword">Contraseña: </label>
            <input type="password" name="txtPassword" id="txtPassword" required>
        </div>
        <button type="submit">Ingresar</button>
    </form>
</div>