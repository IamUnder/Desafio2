<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head><!-- Required meta tags -->
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

        <title>Recuperar Contraseña</title>
    </head>
    <body class="rosemary">
        <div class="container-fluid">

            <header class="row text-white background-green align-items-center">
                <div class="col-md-12 vh-10">
                    <img src="../img/logo.png" alt="Logo_mamas2.0" class="img-fluid vh-10" />
                </div>
            </header>

            <main class="row vh-80 d-flex align-items-center justify-content-center">
                <div class="col-md-4 col-sm-4">
                    <div class="text-center">
                        <h1>Recuperar contraseña</h1>
                    </div>

                    <?php
                    session_start();
                    //Compruebo si existe la sesion
                    if (isset($_SESSION['recuperarPass'])) {
                        //Si existe, recupero el paso por el cual va el usuario
                        $paso = $_SESSION['recuperarPass'];
                    } else {
                        //Si no existe, es la primera vez, le damos el paso 1
                        $paso = 1;
                        $_SESSION['recuperarPass'] = $paso;
                    }
                    ?>

                    <form class="text-center border border-light mt-2 jus" action="../controlador.php" method="POST" name="formulario">
                        <?php
                        if (isset($_SESSION['mensaje'])) {
                            echo $_SESSION['mensaje'];
                            $_SESSION['mensaje'] = null;
                        }
                        if (isset($paso)) {
                            if ($paso == 1) {
                                ?>
                                <!-- DNI -->
                                <input type="text" id="dni" name="recuperar_dni" aria-describedby="dniError" class="form-control mb-4" placeholder="Introduce tu DNI" required pattern="\d{8}[A-Z]">

                                <!-- E-mail -->
                                <input type="email"  id="mail" name="recuperar_mail" class="form-control mb-4" placeholder="Introduce tu E-mail" required>

                                <!-- Botones registrar y volver -->
                                <div class="form-row mb-4"> 
                                    <div class="col">
                                        <button name="form_recuperar_next" class="btn btn-outline-success my-4 btn-block" type="submit">Siguiente paso</button>
                                    </div>
                                    <?php
                                } else {
                                    ?>
                                    <!-- Contraseña -->
                                    <input type = "password" name = "recuperar_pass1" id = "pass" class = "form-control mb-4" placeholder = "Introduce la nueva contraseña" aria-describedby = "pass" required minlength = "8" maxlength = "10" pattern = "^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,10}">
                                    <!-- Confirmar pass -->
                                    <input type = "password" name = "recuperar_pass2" id = "pass2" class = "form-control mb-4" placeholder = "Vuelve a introducir la contraseña" aria-describedby = "pass" required minlength = "8" maxlength = "10" pattern = "^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,10}">
                                    <div class="form-row mb-4"> 
                                        <div class="col">
                                            <button name="form_recuperar_end" class="btn btn-outline-success my-4 btn-block" type="submit">Confirmar cambios</button>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                    <div class="col">
                                        <a href="../index.php" class="btn btn-outline-danger my-4 btn-block" type="submit">Volver</a>
                                    </div>
                                </div>
                        </form>
                        <?php
                    }
                    ?>

                </div>
            </main>

            <footer class="row background-green text-white d-flex align-items-center justify-content-center vh-10">
                <h3>Aplicación creada por Jorge y Alejandro</h3>
            </footer>
        </div>
    </body>
</html>
