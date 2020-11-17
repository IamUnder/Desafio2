<!DOCTYPE html>
<html>
    <head>
        <!<!-- reCaptcha V3 -->
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
        <link rel="stylesheet" href="../CSS/fuentes.css">
        <link rel="stylesheet" href="../CSS/fondos.css">
        <link rel="stylesheet" href="../CSS/tamanios.css">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

        <title>Registro de Usuario</title>
    </head>
    <body class="rosemary">
        <div class="container-fluid">
            <header class="row text-white background-green align-items-center vh-10">
                <h1 class="ml-5">Registro de usuario</h1>
            </header>

            <main class="row vh-80 d-flex align-items-center justify-content-center">
                <form class="text-center border border-light mt-2 jus" action="../controlador.php" method="POST">
                    <input type="hidden" name="recaptcha_response" id="recaptchaResponse">
                    <div class="form-row mb-4">
                        <div class="col">
                            <!-- Primer nombre -->
                            <input type="text" name="nombre" class="form-control" placeholder="Introduce el nombre" required>
                        </div>
                        <div class="col">
                            <!--<!-- Apellidos -->
                            <input type="text" name="apellido" class="form-control" placeholder="Introduce tus apellidos" required>
                        </div>
                    </div>

                    <!-- DNI -->
                    <input type="text" name="dni" class="form-control mb-4" placeholder="Introduce tu DNI" required>

                    <!-- E-mail -->
                    <input type="email" name="mail" class="form-control mb-4" placeholder="Introduce tu E-mail" required>

                    <!-- Contraseña -->
                    <input type="password" name="pass" id="password" class="form-control" placeholder="Introduce tu contraseña" aria-describedby="password" required>
                    <small id="password" class="form-text text-muted mb-4">
                        Al menos 8 carácteres y 1 dígito
                    </small>

                    <!-- Botones registrar y volver -->
                    <div class="form-row mb-4">
                        <div class="col">
                            <button name="registrar" class="btn btn-outline-success my-4 btn-block" type="submit">Registrar</button>
                        </div>
                        <div class="col">
                            <a href="../index.php" class="btn btn-outline-danger my-4 btn-block" type="submit">Volver</a>
                        </div>
                    </div>

                    <input type="hidden" name="recaptcha_response" id="recaptchaResponse">
                </form>
            </main>

            <footer class="row background-green text-white d-flex align-items-center vh-10">
                <h3 class="ml-5">Aplicación creada por Jorge y Alejandro</h3>
            </footer>
        </div>
    </body>
</html>
