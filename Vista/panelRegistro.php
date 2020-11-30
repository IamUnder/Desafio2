<!DOCTYPE html>
<html>
    <head>
        <!-- reCaptcha V3 -->
        <script src='https://www.google.com/recaptcha/api.js?render=6Led9OMZAAAAAAD5MHNb6t1n5v3npSkSKpjbVxSc'>
        </script>
        <script>
            grecaptcha.ready(function () {
                grecaptcha.execute('6Led9OMZAAAAAAD5MHNb6t1n5v3npSkSKpjbVxSc', {action: 'formulario'})
                        .then(function (token) {
                            var recaptchaResponse = document.getElementById('recaptchaResponse');
                            recaptchaResponse.value = token;
                        });
            });
        </script>

        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/fuentes.css">
        <link rel="stylesheet" href="../css/fondos.css">
        <link rel="stylesheet" href="../css/tamanios.css">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

        <title>Registro de Usuario</title>
    </head>
    <body class="rosemary" onload="validacion()">
        <div class="container-fluid">
            <header class="row text-white background-green align-items-center">
                <div class="col-md-12 vh-10">
                    <img src="../img/logo.png" alt="Logo_mamas2.0" class="img-fluid vh-10" />
                </div>
            </header>

            <main class="row vh-80 d-flex align-items-center justify-content-center">
                <div class="col-md-4 col-sm-4">
                    <div class="text-center">
                        <h1>Registro de usuario</h1>
                    </div>
                    <form novalidate class="text-center border border-light mt-2 jus" action="../controlador.php" method="POST" name="formulario">
                        <?php
                        session_start();
                        if (isset($_SESSION['mensaje'])) {
                            echo $_SESSION['mensaje'];
                            $_SESSION['mensaje'] = null;
                        }
                        ?>
                        <div class="form-row mb-4">
                            <div class="col">
                                <!-- Primer nombre -->
                                <input type="text" id="nombre" name="registro_nombre" aria-describedby="nombreError" class="form-control" placeholder="Introduce el nombre" required>
                                <small id="nombreError" class="form-text" aria-live="polite"></small>
                            </div>
                            <div class="col">
                                <!--<!-- Apellidos -->
                                <input type="text" id="apellido" name="registro_apellido" aria-describedby="apellidoError" class="form-control" placeholder="Introduce tus apellidos" required>
                                <small id="apellidoError" class="form-text" aria-live="polite"></small>
                            </div>
                        </div>

                        <!-- DNI -->
                        <input type="text" id="dni" name="registro_dni" aria-describedby="dniError" class="form-control mb-4" placeholder="Introduce tu DNI" required pattern="\d{8}[A-Z]">
                        <small id="dniError" class="form-text" aria-live="polite"></small>

                        <!-- E-mail -->
                        <input type="email"  id="mail" name="registro_mail" class="form-control mb-4" placeholder="Introduce tu E-mail" required>
                        <small id="mailError" class="form-text" aria-live="polite"></small>

                        <!-- Contraseña -->
                        <input type="password" name="registro_pass" id="pass" class="form-control" placeholder="Introduce tu contraseña" aria-describedby="pass" required minlength="8" maxlength="10" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,10}">
                        <small id="passError" class="form-text" aria-live="polite"></small>

                        <!-- Botones registrar y volver -->
                        <div class="form-row mb-4">
                            <div class="col">
                                <button name="form_registrar" class="btn btn-outline-success my-4 btn-block" type="submit">Registrar</button>
                            </div>
                            <div class="col">
                                <a href="../index.php" class="btn btn-outline-danger my-4 btn-block" type="submit">Volver</a>
                            </div>
                        </div>

                        <input type="hidden" name="recaptcha_response" id="recaptchaResponse">

                    </form>
                </div>
            </main>

            <footer class="row background-green text-white d-flex align-items-center justify-content-center vh-10">
                <h3>Aplicación creada por Jorge y Alejandro</h3>
            </footer>
        </div>
        <script src="../js/registroValidacion.js"></script>
    </body>
</html>
