<?php include 'header.php' ?>
<main class="container">
    <section class="row">
        <form class="col-lg-6" action="login.php" method="post">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="username" id="username" placeholder="Digite su nombre de usuario">
                <label for="username">Nombre de usuario</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" name="password" id="password" placeholder="Digite su contraseña">
                <label for="password">Contraseña</label>
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="remember-me">
                <label class="form-check-label" for="remember-me">Recuérdame</label>
            </div>
            <div>
                <input type="submit" class="btn btn-primary" value="Iniciar sesión">
            </div>
            <div class="mt-2 text-center">
                <a href="password-reset.php">¿Olvidaste tu contraseña?</a> |
                <a href="register.php">¿No tienes una cuenta? Regístrate</a>
            </div>
        </form>
    </section>
</main>
<?php include 'footer.php' ?>
